<?php
 
class Paginator {
 
     private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;
        private $_region;
        private $_jenjang;
        private $q;
        private $_id;
		private $singo=0;
		private $favs=0;
		private $_search=0;
        function __construct( $conn, $query ) {
     
    $this->_conn = $conn;
    $this->_query = $query;
    
 
    $rs= $this->_conn->query( $this->_query );
    $this->_total = $rs->num_rows;
}


		
 function getData( $limit = 10, $page = 1 ) {
     
    $this->_limit   = $limit;
    $this->_page    = $page;
 
    if ( $this->_limit == 'all' ) {
        $query      = $this->_query;
    } else {
        $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
    }
    $rs             = $this->_conn->query( $query );
 
    while ( $row = $rs->fetch_assoc() ) {
        $results[]  = $row;
    }
 
    $result         = new stdClass();
    $result->page   = $this->_page;
    $result->limit  = $this->_limit;
    $result->total  = $this->_total;
    $result->data   = $results;
    
    return $result;
}

	function term($region,$jenjang){
		$this->_region=$region;
		$this->_jenjang=$jenjang;
		$this->singo=1;
	}
	function favSearch($region,$jenjang){
		$this->_region=$region;
		$this->_jenjang=$jenjang;
		$this->favs=1;
	}
	function search($q){
		$this->q=$q;
		$this->_search=1;
	}

function createLinks( $links, $list_class ) {
    if ( $this->_limit == 'all' ) {
        return '';
    }
 	
 	if($this->_search==1){

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?search='.$this->q.'&fav=1&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }
 	elseif($this->favs==1){

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&fav=1&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&fav=1&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&fav=1&limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&fav=1&limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }
    elseif($this->singo==1){

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?region='.$this->_region.'&jenjang='.$this->_jenjang.'&limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }else{

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }

   
}

function searchGuru($q){
	$this->q=$q;
	$this->_search=1;

}
function searchGuruSekolah($q,$id){
	$this->q=$q;
	$this->_id=$id;
	$this->singo=1;

}

function createLinksGuru( $links, $list_class ) {
    if ( $this->_limit == 'all' ) {
        return '';
    }
 	
 	if($this->_search==1){

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?search='.$this->q.'&limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }elseif($this->singo==1){

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?id='.$this->_id.'&search='.$this->q.'&fav=1&limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?id='.$this->_id.'&search='.$this->q.'&limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?id='.$this->_id.'&search='.$this->q.'&limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?id='.$this->_id.'&search='.$this->q.'&limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }else{

    	 $last       = ceil( $this->_total / $this->_limit );
 
    $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;
 
    $html       = '<ul class="' . $list_class . '">';
 
    $class      = ( $this->_page == 1 ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';
 
    if ( $start > 1 ) {
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
        $html   .= '<li class="disabled"><span>...</span></li>';
    }
 
    for ( $i = $start ; $i <= $end; $i++ ) {
        $class  = ( $this->_page == $i ) ? "active" : "";
        $html   .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }
 
    if ( $end < $last ) {
        $html   .= '<li class="disabled"><span>...</span></li>';
        $html   .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }
 
    $class      = ( $this->_page == $last ) ? "disabled" : "";
    $html       .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ($this->_page + 1) . '">&raquo;</a></li>';
 
    $html       .= '</ul>';
 
    return $html;
    }
 	
   
}


}





?>