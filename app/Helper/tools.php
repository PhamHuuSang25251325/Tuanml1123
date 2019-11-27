<?php

use \SplFileInfo as SplFileInfo;
if(!function_exists('upload_image'))
{
    /**
    * @param $file [tên file trùng tên input]
    * @param array $extend [ định dạng file có thể upload được]
    * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
    */
    function upload_image($file , $folder = '',array $extend = array() )
    {
        $code = 1;
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];
        $info = new SplFileInfo($baseFilename);
        $ext = strtolower($info->getExtension());
        if ( ! $extend )
        {
            $extend = ['png','jpg','jpeg','jfif'];
        }
        if( !in_array($ext,$extend))
        {
            return $data['code'] = 0;
        }
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;
        $path = public_path().'/uploads/'.date('Y/m/d/');
        if ($folder)
        {
            $path = public_path().'/uploads/'.$folder.'/'.date('Y/m/d/');
        }
        if ( !\File::exists($path))
        {
            mkdir($path,0777,true);
        }
        move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);
        $data = [
            'name' => $filename,
            'code' => $code,
            'path_img' => 'uploads/'.$filename
        ];
        return $data;
    }
}
if(!function_exists('parse_url_file'))
{
    function parse_url_file($image,$folder = '')
    {
        if (!$image)
        {
            return'/images/no-image.jpg';
        }
        $explode = explode('__', $image);
        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads/'.$folder.'/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}
if(!function_exists('get_data_user'))
{
    function get_data_user($type,$field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}

if(!function_exists('parseOrderBy'))
{
    function parseOrderBy($input){
        // -ascii_title, ascii_title
        $order = 'desc';
        $field = 'id';
        if(!$input){
            return [$field, $order];
        }
        if(in_array($input[0], ['-', '+'])){
            if($input[0] === '-'){
                $order = 'desc';
            }else{
                $order = 'asc';
            }
            $field = substr($input, 1);
        }else{
            $order = 'asc';
            $field = $input;
        }
        return [$field, $order];
    }
}




