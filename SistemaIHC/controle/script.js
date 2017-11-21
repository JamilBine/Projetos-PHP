function converter_data($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}

function converter_data2($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}