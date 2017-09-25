<?

class xmysqli extends mysqli{
	private $host;
	private $username;
	private $passwd;
	private $dbname	;
	private $port;
	private $socket;
	
	protected $data;
	
	public $assoc=MYSQLI_ASSOC; // MYSQLI_ASSOC, MYSQLI_NUM, || MYSQLI_BOTH
	public $status ;
	public $num_rows;
	public $affected_rows;
	public $lastsql;
	public $qresult=null;
	public $table;
	
	/**
	 * show mysql error 
	 * @var bool
	 */
	public $show_error=false;
	
	/**
	 * show sql statement 
	 *
	 * @var bool
	 */
	public $show_sql=false;
	
	/**
	 * Show sql statement if error occur
	 *
	 * @var bool
	 */
	public $show_sql_error=false;
	
	public $xml_root='root';
	public $xml;
	public $insert_id;
	public $return_result=false;
	public $charset='utf8';
	
	
	function __construct($host='',$username='',$passwd='',$dbname='',$port='',$socket=''){
		if(!empty($username)){ //an exei dilo8ei user name tote kani to connection
			$this->connect($host,$username,$passwd,$dbname,$port,$socket);

			unset($host,$username,$passwd,$dbname,$port,$socket);
		}
	}
	
	
	public function connect($host='',$username='',$passwd='',$dbname='',$port='',$socket=''){
		$this->host=$host;
		$this->username=$username;
		$this->passwd=$passwd;
		$this->dbname=$dbname;
		$this->port=$port;
		$this->socket=$socket;
		unset($host,$username,$passwd,$dbname,$port,$socket);
		@parent::__construct($this->host,$this->username,$this->passwd,$this->dbname/*.eval(' (!empty($this->port))?",$this->port":"";').eval(' (!empty($this->socket))?",$this->socket":"";')*/);
		if (mysqli_connect_errno()) {
			printf("Connect to the database server failed: %s\n", mysqli_connect_error());
			exit();
		}else{
			parent::query("SET NAMES '".$this->charset."'");
		}
	}
	
	
	public function close(){
		self::__destruct();
	}
	
	
	function __destruct(){
		$this->status="disconected";
		@parent::close();
	}
	
	
	public function __set($key,$val){
	 	$this->data[$key]=$val;
	}
	
	
	public function __get($key){
	 	return $this->data[$key];
	}
	
	
	/**
	 * Kani ena erotima stin database
	 *
	 * @param string $query -> Sql query
	 * @param $mode 'single'||'multi' aplo i polaplo erotima
	 * @return mysql_result
	 */
	public function query($query,$mode='single'){
		$this->lastsql=$query;
		
		switch($mode){
			case 1:
			case '':
			case 'single':
				$this->qresult=@parent::query($this->lastsql);
				break;
			case 2:
			case 'multi':
			case 'multiple':
				$ok=@parent::multi_query($query);
				do{
			  	$this->qresult=@parent::store_result();
			    if(($ok==true)&&empty($this->qresult)){
			    	$this->qresult=true;
			    }
			  }while(@parent::next_result());
			  break;
		}
		
		if($this->show_sql){
			print('<br />'.$this->lastsql.'<br />');
		}
		
		if($this->errno!=0){
			if(($this->show_sql==false) && ($this->show_sql_error==true)){
				print('<br />'.$this->lastsql);
			}
			if($this->show_error){
				print('<br />'.$this->error);
			}
		}
		if(@$this->num_fields()){ 
			for($f=0;$f<@$this->num_fields();$f++){
				$info=@$this->qresult->fetch_field();
				$this->qresult->fields[$f]['name']=@$info->name;
				$this->qresult->fields[$f]['orgname']=@$info->orgname;
				$this->qresult->fields[$f]['table']=@$info->table;
				$this->qresult->fields[$f]['orgtable']=@$info->orgtable;
				$this->qresult->fields[$f]['def']=@$info->def;
				$this->qresult->fields[$f]['max_length']=@$info->max_length;
				$this->qresult->fields[$f]['flags']=@$info->flags;
				$this->qresult->fields[$f]['type']=@$info->type;
				$this->qresult->fields[$f]['decimals']=@$info->decimals;
				$this->qresult->table=@trim($this->qresult->fields[0]['table']);
				if(empty($this->qresult->table)){
					$this->qresult->table=$this->xml_root;
				}
			}
			@$this->qresult->field_seek(0);
		}
		@$this->num_rows=is_object(@$this->qresult)?@$this->qresult->num_rows:null;
		return @$this->qresult;
	}
	
	
	/**
	 * Insert row in table
	 *
	 * @param array $params
	 * @example $params['articles']=array('fname'=>'manos','lname'=>'papadakis');
	 * @return int insert_id
	 */
	public function insert($params){
		$rdata=0;
		$data=array();
		$sql=array();
		if(!empty($params)){
			$sql=array();
			foreach($params as $tname=>$cvalue){
				$data=array();
				foreach($cvalue as $field=>$value){
					$marray=array();
					if(preg_match('/^#(.*)$/',$field,$marray)){
						$field=$marray[1];
						$data[]="`".trim($field,'`')."`=".$value;
					}else{
						$data[]="`".trim($field,'`')."`='".$value."'";
					}
				}
				$tname=trim($tname,'`');
				$this->query("INSERT `".$tname."` SET ".implode(',',$data)." ;");
				$rdata=$this->insert_id;
			}
		}
		return $rdata;
	}
	
	/**
	 * Insert rows in table
	 *
	 * @param array $params
	 * @example $params['articles'][0]=array('fname'=>'manos','lname'=>'papadakis');
	 * @return array insert_ids
	 */
	 
	public function inserts($params){
		$rdata=array();
		$data=array();
		$sql=array();
		if(!empty($params)){
			$sql=array();
			foreach($params as $tname=>$icount){
				foreach($icount as $ckey=>$cvalue){
					$data=array();
					foreach($cvalue as $field=>$value){
						$marray=array();
						if(preg_match('/^#(.*)$/',$field,$marray)){
							$field=$marray[1];
							$data[]="`".trim($field,'`')."`=".$value;
						}else{
							$data[]="`".trim($field,'`')."`='".$value."'";
						}
					}
					$this->query("INSERT `".$tname."` SET ".implode(',',$data)." ;");
					$rdata[$tname][$ckey]=$this->insert_id;
				}
			}
		}
		return $rdata;
	}
	
	
	
	/**
	 * Update row/s in table
	 *
	 * @param array $params
	 * @param string $where
	 * @example $params['articles']=array('fname'=>'manos','lname'=>'papadakis');
	 * @return affected_rows
	 */
	public function update($params,$where){
		$rdata=0;
		$data=array();
		$sql=array();
		if(!empty($params)){
			$sql=array();
			foreach($params as $tname=>$cvalue){
				$data=array();
				foreach($cvalue as $field=>$value){
					$marray=array();
					if(preg_match('/^#(.*)$/',$field,$marray)){
						$field=$marray[1];
						$data[]="`".trim($field,'`')."`=".$value;
					}else{
						$data[]="`".trim($field,'`')."`='".$value."'";
					}
				}
				$this->query("UPDATE `".$tname."` SET ".implode(',',$data)." ".(!empty($where)?"WHERE ".$where:'').";");
				$rdata=$this->affected_rows;
			}
		}
		return $rdata;
	}
	
	
	/**
	 * Delete row/s in table
	 *
	 * @param string $tname
	 * @param string $where
	 *
	 * @return affected_rows
	 */
	public function delete($tname,$where){
		$rdata=0;
		if(!empty($tname)){
			$this->query("DELETE FROM `".$tname."` ".(!empty($where)?"WHERE ".$where:'').";");
			$rdata=$this->affected_rows;
		}
		return $rdata;
	}
	
	
	
	/**
	 * Epistrefi ena row apo to proigoumeno erotima
	 *
	 * @param string $assoc
	 * @return array
	 */
	public function fetch($assoc=MYSQLI_ASSOC){
		$this->assoc=$assoc;
		return @$this->qresult->fetch_array($this->assoc);
	}
	
 /**
	 * Return the first column of the first row in the result set returned by the query. Extra columns or rows are ignored.
	 *
	 * @param string $sql
	 * @param bool $error
	 * @return string
	 */
	public function fetchv($sql=null,$show_error=false){
		if(!empty($sql)){
			$temp=$this->show_error;
			$this->show_error=$show_error;
			$this->query($sql);
			$this->show_error=$temp;
		}
		$row=@$this->qresult->fetch_array(MYSQLI_NUM);
		@$this->qresult->data_seek(0);
		@$this->qresult->field_seek(0);
		return (isset($row[0])?$row[0]:null);
	}
	
	/**
	 * Epistrefi ena row apo to erotima pou perni san parametro
	 *
	 * @param string $sql
	 * @param string $assoc
	 *
	 * @return array
	 */
	public function fetchq($sql,$assoc=MYSQLI_ASSOC){
		$this->query($sql);
		return @$this->qresult->fetch_array($assoc);
	}

	
	/**
	 * Epistrefi ena ari8mitiko array me olla ta row apo to proigoumeno erotima
	 *
	 * @param string $assoc
	 * @return array
	 */
	public function fetch_all($assoc=MYSQLI_ASSOC){
		$output=array();
		while($row=$this->fetch($assoc)){
			$output[]=$row;
		}
		
		@$this->qresult->data_seek(0);
		@$this->qresult->field_seek(0);
		
		return $output;
	}
	
	
/*
palia
	public function get_row($table,$id,$id_field='id'){
		$rows=array();
		if($this->query(sprintf("SELECT * FROM `%s` WHERE `%s`=%u ;",$table,$id_field,$id))){
			$row=$this->fetch(MYSQL_NUM);
			for($i=0;$i<$this->field_count;$i++){
				$rows[$this->qresult->fields[$i]['name']]=(isset($row[$i])?$row[$i]:null);
			}
		}
		return $rows;
	}*/
	
/*
	palia
	public function get_rows($table,$extra=''){
		$rows=array();
		if($this->query("SELECT * FROM `$table` $extra ;")){
			if($this->num_rows){
				$j=0;
				while($row=$this->fetch(MYSQL_NUM)){
					for($i=0;$i<$this->field_count;$i++){
						$rows[$j][$this->qresult->fields[$i]['name']]=(isset($row[$i])?$row[$i]:null);
					}
					$j++;
				}
			}
		}
		return $rows;
	}*/
	
	/**
	 * Epistrefi ena monodiastato array me to row apo tin vasi
	 *
	 * @param string $table_name -> to onoma tou pinaka
	 * @param string $id -> to key
	 * @param string $id_field -> proeretiko key field
	 * @return array -> to row
	 */	
	public function get_row($table_name,$id,$id_field='id'){
		return $this->fetchq(sprintf("SELECT * FROM `%s` WHERE `%s`=%u ;",$table_name,$id_field,$id));
	}
	
	
	/**
	 * Epistrefi ena polidiastato array me ta rows apo tin vasi
	 *
	 * @param string $table_name -> to onoma tou pinaka
	 * @param string $sql_extra -> extra sql gia tin siblirosi tou erotimatos
	 * @return array -> to row
	 */	
	public function get_rows($table_name,$sql_extra=''){
		if($this->query("SELECT * FROM `$table_name` $sql_extra ;")){
			return $this->fetch_all();
		}
	}
	
	
	
	private function num_rows(){
		return $this->qresult->num_rows;
	}

	
	private function num_fields(){
		return is_object(@$this->qresult)?@$this->qresult->field_count:null;
	}
	
	
	/**
	 * Dimiourgi tin XML apo to proigoumeno erotima
	 *
	 * @param int $xml_mode -> typos XML e.g 1: <record var="val" /> 2: <var>val</var>
	 * @param int $charset -> xml charset
	 * @return string
	 */
	public function get_xml($xml_mode=0,$charset='utf-8'){
		$string="<?xml version=\"1.0\" encoding=\"".$charset."\"?>\n";
		$string.="<".$this->qresult->table.">\n";
		while($row=@$this->fetch($this->assoc)){
			if($xml_mode==0 || strlen($xml_mode)==0){
				$string.="\t<record";
				foreach($row as $key=>$value){
					$string.=" ".$key."=\"".htmlspecialchars(stripslashes($value))."\"";
				}
				$string.=" />\n";
			}elseif($xml_mode==1){
				$string.="<record>\n";
				foreach($row as $key=>$value){
					$string.="\t<".$key.">".htmlspecialchars(stripslashes($value))."</".$key.">\n";
				}
				$string.="</record>\n";
			}
		}
		$string.="</".$this->qresult->table.">\n";
		@$this->qresult->data_seek(0);
		@$this->qresult->field_seek(0);
		return $string;
	}
	
	
	/**
	 * Ftiaxni kai epistrefi ena JSON string
	 *
	 * @return string se JSON morfi
	 */
	public function get_json($path_name){
		$array=array();
		while($row=@$this->fetch($this->assoc)){
				$array[(!empty($path_name)?$path_name:$this->qresult->table)][]=$row;
		}
		@$this->qresult->data_seek(0);
		@$this->qresult->field_seek(0);
		return json_encode($array);
	}
	
	
	/**
	 * Auti i sinartysi antika8ista antikimena mesa stin vasi
	 *
	 * @param string $search -> auto pou 8es na psaksis
	 * @param string $replace -> auto me to opio 8es na to andikatastisis
	 * @param string $field -> To pedio sto opio 8es na psaksis. An einai * tote psaxni pantou
	 * @param string $table -> Se pion pinaka
	 * @param string $where_sql -> epipros8eto erotima
	 * @return array me ola auta pou exoun antikatasta8ei
	 */
	public function replace($search,$replace,$field='*',$table,$where_sql=''){
		$field=($field!='*'?"`".$field."`":'*');// An field den einai * tote 8a ginei `field`
		$sql="SELECT `".$table."`.".$field." FROM `".$table."` ".$where_sql." ;";
		$queryr1=$this->query($sql);
		$rows=$this->fetch_all(MYSQL_NUM);
		
		for($i=0;$i<count($rows);$i++){
			for($j=0;$j<$this->qresult->field_count;$j++){
				if(isset($rows[$i][$j])){
					if(strpos($rows[$i][$j],$search)!==false){
						//echo $rows[$i][$j];
						//echo preg_replace('/'.$search.'/',$replace,$rows[$i][$j]);
						$output[$i][$this->qresult->fields[$j]['name']]=str_replace($search,$replace,$rows[$i][$j]);
						//echo $output[$i][$this->qresult->fields[$j]['name']];
						$sql="UPDATE `".$this->qresult->fields[$j]['table']."` SET ".$this->qresult->fields[$j]['name']."='".$output[$i][$this->qresult->fields[$j]['name']]."' WHERE ".$this->qresult->fields[$j]['name']."= '".$rows[$i][$j]."'";
						//echo $sql;
						$this->query($sql);
						$this->qresult=$queryr1;
					}
				}
			}
		}
		unset($search,$replace,$field,$table,$where_sql,$sql,$queryr1,$this->qresult);
		return @$output;
	}
	
	
	public function replace_htmlentities_with_greek_leters($table='',$field='*',$where_sql=''){
		$entities_array=array('Î‘'=>array('name'=>'&Alpha;'  , 'code'=>'&#913;'),
													'Î’'=>array('name'=>'&Beta;'   , 'code'=>'&#914;'),
													'Î“'=>array('name'=>'&Gamma;'  , 'code'=>'&#915;'),
													'Î”'=>array('name'=>'&Delta;'  , 'code'=>'&#916;'),
													'Î•'=>array('name'=>'&Epsilon;', 'code'=>'&#917;'),
													'Î–'=>array('name'=>'&Zeta;'   , 'code'=>'&#918;'),
													'Î—'=>array('name'=>'&Eta;'    , 'code'=>'&#919;'),
													'Î?'=>array('name'=>'&Theta;'  , 'code'=>'&#920;'),
													'Î™'=>array('name'=>'&Iota;'   , 'code'=>'&#921;'),
													'Î?'=>array('name'=>'&Kappa;'  , 'code'=>'&#922;'),
													'Î›'=>array('name'=>'&Lambda;' , 'code'=>'&#923;'),
													'Î?'=>array('name'=>'&Mu;'     , 'code'=>'&#924;'),
													'Î?'=>array('name'=>'&Nu;'     , 'code'=>'&#925;'),
													'Î?'=>array('name'=>'&Xi;'     , 'code'=>'&#926;'),
													'Î?'=>array('name'=>'&Omicron;', 'code'=>'&#927;'),
													'Î '=>array('name'=>'&Pi;'     , 'code'=>'&#928;'),
													'Î¡'=>array('name'=>'&Rho;'    , 'code'=>'&#929;'),
													'Î£'=>array('name'=>'&Sigma;'  , 'code'=>'&#931;'),
													'Î¤'=>array('name'=>'&Tau;'    , 'code'=>'&#932;'),
													'Î¥'=>array('name'=>'&Upsilon;', 'code'=>'&#933;'),
													'Î¦'=>array('name'=>'&Phi;'    , 'code'=>'&#934;'),
													'Î§'=>array('name'=>'&Chi;'    , 'code'=>'&#935;'),
													'Î¨'=>array('name'=>'&Psi;'    , 'code'=>'&#936;'),
													'Î©'=>array('name'=>'&Omega;'  , 'code'=>'&#937;'),
													'Î±'=>array('name'=>'&alpha;'  , 'code'=>'&#945;'),
													'Î²'=>array('name'=>'&beta;'   , 'code'=>'&#946;'),
													'Î³'=>array('name'=>'&gamma;'  , 'code'=>'&#947;'),
													'Î´'=>array('name'=>'&delta;'  , 'code'=>'&#948;'),
													'Îµ'=>array('name'=>'&epsilon;', 'code'=>'&#949;'),
													'Î¶'=>array('name'=>'&zeta;'   , 'code'=>'&#950;'),
													'Î·'=>array('name'=>'&eta;'    , 'code'=>'&#951;'),
													'Î¸'=>array('name'=>'&theta;'  , 'code'=>'&#952;'),
													'Î¹'=>array('name'=>'&iota;'   , 'code'=>'&#953;'),
													'Îº'=>array('name'=>'&kappa;'  , 'code'=>'&#954;'),
													'Î»'=>array('name'=>'&lambda;' , 'code'=>'&#923;'),
													'Î¼'=>array('name'=>'&mu;'     , 'code'=>'&#956;'),
													'Î½'=>array('name'=>'&nu;'     , 'code'=>'&#925;'),
													'Î¾'=>array('name'=>'&xi;'     , 'code'=>'&#958;'),
													'Î¿'=>array('name'=>'&omicron;', 'code'=>'&#959;'),
													'Ï€'=>array('name'=>'&pi;'     , 'code'=>'&#960;'),
													'Ï?'=>array('name'=>'&rho;'    , 'code'=>'&#961;'),
													'Ï‚'=>array('name'=>'&sigmaf;' , 'code'=>'&#962;'),
													'Ïƒ'=>array('name'=>'&sigma;'  , 'code'=>'&#963;'),
													'Ï„'=>array('name'=>'&tau;'    , 'code'=>'&#964;'),
													'Ï…'=>array('name'=>'&upsilon;', 'code'=>'&#965;'),
													'Ï†'=>array('name'=>'&phi;'    , 'code'=>'&#966;'),
													'Ï‡'=>array('name'=>'&chi;'    , 'code'=>'&#967;'),
													'Ï?'=>array('name'=>'&psi;'    , 'code'=>'&#968;'),
													'Ï‰'=>array('name'=>'&omega;'  , 'code'=>'&#969;'));
			$output='';
			foreach($entities_array as $key=>$value){
				if(!empty($value['name'])){
					$output.=$this->replace($value['name'],$key,$field,$table,$where_sql);
				}
				if(!empty($value['code'])){
					$output.=$this->replace($value['code'],$key,$field,$table,$where_sql);
				}
			}						
		return $output;
	}
	
	
	public function get_db_struct($database){
	  $sql="SELECT * FROM `information_schema`.`TABLES` WHERE `TABLE_SCHEMA` ='$database' ;";     		
		$this->query($sql);
		return $this->fetch_all();
	}
	
	
	public function get_table_struct($database,$table){
	  $sql="SELECT * FROM `information_schema`.`COLUMNS` WHERE `TABLE_SCHEMA`='$database' AND `TABLE_NAME`='$table' GROUP BY `COLUMN_NAME` ORDER BY `ORDINAL_POSITION`;";     		
		$this->query($sql);
		return $this->fetch_all();
	}
	
	
	/**
	 * Sinartisi pou perni san parametro to onoma tis vasis to onoma tou pinaka kai to onoma enos field kai epistrefi tin esoteriki domi tou field
	 *
	 * @example Array
                (
                    [TABLE_CATALOG] => 
                    [TABLE_SCHEMA] => spused
                    [TABLE_NAME] => brands
                    [COLUMN_NAME] => id
                    [ORDINAL_POSITION] => 1
                    [COLUMN_DEFAULT] => 
                    [IS_NULLABLE] => NO
                    [DATA_TYPE] => int
                    [CHARACTER_MAXIMUM_LENGTH] => 
                    [CHARACTER_OCTET_LENGTH] => 
                    [NUMERIC_PRECISION] => 10
                    [NUMERIC_SCALE] => 0
                    [CHARACTER_SET_NAME] => 
                    [COLLATION_NAME] => 
                    [COLUMN_TYPE] => int(10) unsigned
                    [COLUMN_KEY] => PRI
                    [EXTRA] => auto_increment
                    [PRIVILEGES] => select,insert,update,references
                    [COLUMN_COMMENT] => 
                )
	 * 
	 * @param string $database
	 * @param string $table
	 * @param string $field
	 * @return Epistrefi tin esoteriki domi tou field
	 */
	public function get_field_struct($database,$table,$field){
		$sql="SELECT * FROM `information_schema`.`COLUMNS` WHERE `TABLE_SCHEMA`='$database' AND `TABLE_NAME`='$table' AND `COLUMN_NAME`='$field' ;";     		
		$this->query($sql);
		return $this->fetch();
	}

	
	public function get_ddl($db, $table,$crlf=''){
	    $schema_create='';
	    $auto_increment='';
	
		$sql="SHOW TABLE STATUS FROM `$db` LIKE '$table'";
	    $this->query($sql);
	    if($this->qresult!=false){
	        if($this->qresult->num_rows){
	            $tmpres=$this->fetch();
	            if(!empty($tmpres['Auto_increment'])){
	                $auto_increment.=' AUTO_INCREMENT='.$tmpres['Auto_increment'].' ';
	            }
	        }
	    }
		
	    $sql="SHOW CREATE TABLE $db.$table";
	    $this->query($sql);
	    if($this->qresult!=false){
	    	if($row=$this->fetch(MYSQLI_NUM)){
		        $create_query=$row[1];
		        unset($row);
		   
		        if(strpos($create_query,"(\r\n ")){
		            $create_query = str_replace("\r\n",$crlf,$create_query);
		        }elseif (strpos($create_query, "(\n ")){
		            $create_query = str_replace("\n",$crlf,$create_query);
		        }elseif (strpos($create_query, "(\r ")){
		            $create_query = str_replace("\r",$crlf,$create_query);
		        }
		
		        if (preg_match('@CONSTRAINT|FOREIGN[\s]+KEY@',$create_query)) {
		            $sql_lines=explode($crlf,$create_query);
		            $sql_count=count($sql_lines);
		
		            for ($i=0;$i<$sql_count;$i++) {
		                if (preg_match('@^[\s]*(CONSTRAINT|FOREIGN[\s]+KEY)@', $sql_lines[$i])) {
		                    break;
		                }
		            }
		
		            if ($i!=$sql_count) {
		                $sql_lines[$i-1]=preg_replace('@,$@','',$sql_lines[$i-1]);
		                $create_query=implode($crlf, array_slice($sql_lines,0,$i)).$crlf.implode($crlf,array_slice($sql_lines,$j,$sql_count-1));
		                unset($sql_lines);
		            }
		        }
		        $schema_create.=$create_query;
	    	}
	    }
	    $schema_create=preg_replace('/AUTO_INCREMENT\s*=\s*([0-9])+/','',$schema_create);
	    return $schema_create.=$auto_increment." ;";
	}
	
	
	/**
	 * Apo8ikeuh tin XML ston disko
	 *
	 * @param string $path
	 * @param string $convert_from
	 * @param string $convert_to
	 */
	public function save_xml($path,$convert_from='UTF-8',$convert_to='ISO-8859-7'){
		$this->save_file($path,iconv($convert_from,$convert_to,$this->xml));
	}

	
	public function save_file($path,$data){
		if(!function_exists("file_put_contents")){
	    	function file_put_contents($path,$data){
		    	$handle=@fopen($path,"w");
					if(!$handle){return false;}
		      fwrite($handle,$data);
        	fclose($handle);
					return true;
				}
		}
		$dirname=dirname($path);
		$filename=basename($path);
		if(strlen($dirname)>0){
			$dirs=explode("/", $dirname);
			if(!is_dir($dirname)){
				for($d=0;$d<count($dirs);$d++){
					if($d==0){
						mkdir($dirs[0]);
						$newpath=$dirs[0];
					}else{
						mkdir($newpath."/".$dirs[$d]);
						$newpath.="/".$dirs[$d];
					}
				}
			}
		}
		file_put_contents($path, $data);
	}
}




/**
 * Auti i class klironomi apo tin class xmysqli
 * H doulia tis einai na antigrafh mia vasi apo ena host se ena allo i akoma kai ston idio
 * Na metatrepi ta data apo mia codikopihsi se mia alli
 * An i database iparxi tin diagrafi kai tin ksanaftiaxnh gia na ka8orish ta default charset kai collation 
 */
class copy_convert_database extends xmysqli{
	public $host_s='localhost', $host_d='localhost';//source host and destination host
	public $username_s='root', $username_d='root';//source usarname and destination username
	public $passwd_s='',$passwd_d='';//source password and destination password
	public $dbname_s='',$dbname_d='';//source database name and destination database name //Dilonontai proeretika
	//public $port_s='',$port_d='';//source and destination connection port //Den xrisimopihte
	//public $socket_s='',$socket_d='';//source and destination connection socket //Den xrisimopihte
	public $debug_s=true,$debug_d=true;//enable or disable error reporting
	
	/**
	 * Diloni to charset gia to ka8e connection pou 8a dimiourgisi
	 * Diladi diloni to SET NAME stin database pou xrisimopih
	 * 
	 * p.x.
	 * An i database einai se latin1 kai auto prepi na einai latin1
	 * diaforetika 8a paroume ta data se alli kodikopihsi 
	**/
	public $charset_s='latin1',$charset_d='utf8';//source and destination default charset //Den xriazete
	
	/**
	 * antigrafi mia vasi apo mia pigi se mia alh
	 *
	 * @param string $source_db -> To onoma tis vasis apo tin opia 8a antigrafoun ta data
	 * @param string $dest_db   -> To onoma tis vasis pou 8a kataliksoun ta data
	 * @param string $dest_charset -> To diloni to default charset tis destination vasis
	 * @param string $dest_collation -> To diloni to default collation tis destination vasis
	 * @param string $icov_source -> to charset sto opio einai apo8ikeumena ta data
	 * @param string $icov_dest -> to charset sto opio einai 8a metatrapoun ta data
	 */
	function run($source_db,$dest_db,$dest_charset='utf8',$dest_collation='utf8_unicode_ci',$icov_source='ISO-8859-7',$icov_dest='UTF-8'){
		@$mysqli_s=new xmysqli();//make a connection 
		@$mysqli_d=new xmysqli();//make a connection 
		$mysqli_s->debug=$this->debug_s;//ka8orizi an 8a enfanizontai ta la8i
		$mysqli_d->debug=$this->debug_d;//ka8orizi an 8a enfanizontai ta la8i
		$mysqli_s->charset=$this->charset_s;//dilonei to proepilegmeno charset
		$mysqli_d->charset=$this->charset_d;//dilonei to proepilegmeno charset
		$mysqli_s->connect($this->host_s,$this->username_s,$this->passwd_s,$this->dbname_s);//sintaiete me tin database
		$mysqli_d->connect($this->host_d,$this->username_d,$this->passwd_d,$this->dbname_d);//sintaiete me tin database
		
		$sql="USE `".$source_db."` ;\n";//xrisimopih tin proti database
		$mysqli_s->query($sql);
		
		$sql ="DROP DATABASE IF EXISTS `".$dest_db."`;\n";// diagrafi tin vasi an iparxei
		$sql.="CREATE DATABASE `".$dest_db."` DEFAULT CHARACTER SET ".$dest_charset." COLLATE ".$dest_collation." ;\n";//dimiourgi mia kainouria me charset kai collation auto pou exoumai epileksi
		$sql.="USE `".$dest_db."` ;";//xrisimopih tin vasi
		$mysqli_d->query($sql,'multi');//ektailh ena polaplo erotima
		
		$source_db_struct=$mysqli_s->get_db_struct($source_db);//perno tous pinakes tis vasis
		for($i=0;$i<count($source_db_struct);$i++){//gia ka8e pinaka
			$ddl=$mysqli_s->get_ddl($source_db,$source_db_struct[$i]['TABLE_NAME']);//perno tin domi tou pinaka 
			
			$sql="DROP TABLE IF EXISTS `".$source_db_struct[$i]['TABLE_NAME']."` ;\n";//an iparxh idi ton diagrafo 
			$sql.=$ddl."\n";//dimiourgo ena kainourgio
			$sql.="ALTER TABLE `".$source_db_struct[$i]['TABLE_NAME']."` CONVERT TO CHARACTER SET ".$dest_charset." COLLATE ".$dest_collation." ;\n";//allazo ta charset kai collate se auta pou exh dilosh o xristis 
			$mysqli_d->query($sql,'multi');//ektrelh auto to polaplo erotima
			
			$sql='';//midenizo ti metavliti
			$qresult=$mysqli_s->query("SELECT * FROM `".$source_db_struct[$i]['TABLE_NAME']."` ;");//perno olla ta data apo tin vasi apo ton sigekrimeno pinaka
			if($mysqli_s->qresult->num_rows){//an iparxoun egrafes 
				$rows=$mysqli_s->fetch_all(MYSQL_NUM);//perni oles tis engrafes
				
				//added v2.32
				//perno tin esoteriki domi ka8e field
				//giati autes i plirofories 8a xristoun parakato
				//gia na ksero ti dedomena mpori na kataxori8oun sto ka8e field
				$sqresult=$mysqli_s->qresult;
				foreach($mysqli_s->qresult->fields as $fvalue){
					$field_struct[$source_db_struct[$i]['TABLE_NAME']][$fvalue['orgname']]=$mysqli_s->get_field_struct($source_db,$source_db_struct[$i]['TABLE_NAME'],$fvalue['orgname']);
				}
				$mysqli_s->qresult=$sqresult;
				
				for($j=0;$j<count($rows);$j++){//gia ka8e row
					$sql='INSERT INTO `'.$source_db_struct[$i]['TABLE_NAME'].'` VALUES (';//stini tin sql gia tin egrafh
					for($k=0;$k<count($mysqli_s->qresult->fields);$k++){//gia ka8e field
						if((is_string($rows[$j][$k])||is_float($rows[$j][$k])) && (!preg_match('/\\A(?<!\\S)\\d++(?!\\S)\\Z/',$rows[$j][$k]))){//an einai string h an einai float kai den einai integer bugfix 2.21
							//metatrepi tin kodikopihsi apo tin kodikopihsh pou exoumai se autin pou exoumai dialeksi
							//an vri xaraktires pou den einai anagnosimh tous kanh ignore
							//vgazi ta slashes kai gia logous asfalias ta ksanavazi 
							$sql.='"'.addslashes(stripslashes(iconv($icov_source, $icov_dest.'//IGNORE',$rows[$j][$k]))).'"';
						}else{
							//an to timh einai adia tote elenxo an to sigkekrimeno field dexetai NULL an nai tote perni timi NULL allios perni ena adio string ''
							if($rows[$j][$k]==''){
								if($field_struct[$source_db_struct[$i]['TABLE_NAME']][$mysqli_s->qresult->fields[$k]['orgname']]['IS_NULLABLE']=='YES'){
									$rows[$j][$k]='NULL';
								}else{
									$rows[$j][$k]='';
								}
							}
							//an einai int kataxorite opos einai
							$sql.=$rows[$j][$k];
						}
						
						//an den einai to teleuteo pedio vazi ena ',' gia na domi8i kala to sql string mas
						if(($mysqli_s->qresult->field_count-1)!=$k){
							$sql.=" ,";
						}
					}
					
					$sql.=') ;';//klini to sql mas
					$mysqli_d->query($sql);//ekteli to erotima tis egrafis
					
				}
			}
		}
	}
}
?>