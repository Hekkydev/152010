<?php
if (!function_exists('style_pagination_loading')) {
  function style_pagination_loading(){
    echo $data = '<style>

    /* loading */
    .loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
    .loading .content {
      position: absolute;
      transform: translateY(-50%);
       -webkit-transform: translateY(-50%);
       -ms-transform: translateY(-50%);
      top: 50%;
      left: 0;
      right: 0;
      text-align: center;
      color: #555;
      z-index:2000;
    }
    </style>
    ';
}
}

if (!function_exists('style_loading')) {
  function style_loading(){
    echo $data = '<style>

    /* loading */
    .loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
    .loading .content {
      position: absolute;
      transform: translateY(-50%);
       -webkit-transform: translateY(-50%);
       -ms-transform: translateY(-50%);
      top: 50%;
      left: 0;
      right: 0;
      text-align: center;
      color: #555;
      z-index:2000;
    }
    </style>
    ';
}
}

if (!function_exists('style_loading_black')) {
  function style_loading_black(){
    echo $data = '<style>

    /* loading */
    .loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
    .loading .content {
      position: absolute;
      transform: translateY(-50%);
       -webkit-transform: translateY(-50%);
       -ms-transform: translateY(-50%);
      top: 50%;
      left: 0;
      right: 0;
      text-align: center;
      color: #555;
      z-index:2000;
    }
    </style>
    ';
}
}

if(!function_exists('cutText')){
  function cutText($text, $length, $mode = 2)
{
	if ($mode != 1)
	{
		$char = $text{$length - 1};
		switch($mode)
		{
			case 2:
				while($char != ' ') {
					$char = $text{--$length};
				}
			case 3:
				while($char != ' ') {
					$char = $text{++$num_char};
				}
		}
	}
	return substr($text, 0, $length);
}
}
