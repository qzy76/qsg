<?php
class UploadFile{
	function upload($files,$uploadpath){
		if($files['tmp_name']){
			$r=rand(1,100);
			$filename=date('YmdHis').$r.$this->get_filetype($files['name']);
			$target=$uploadpath.$filename;
			if(copy($files['tmp_name'],'../'.$target)){
				return $filename;
			}
			else{
				$this->showError($files);
			}
		}
		return '';
	}
	function removeFile($filepath,$path){
		  if (!empty($filepath)&&file_exists('../'.$path.$filepath)) {
				    unlink('../'.$path.$filepath);
					return true;
			}
			else{
				return false;
			}
	}
	 function showError($files)
	  {
	         if (isset($files['error'])) 
            {
			
               $php_maxsize = ini_get('upload_max_filesize');
                $htm_maxsize = '2M';
				$msg="";
                if ($files['error'] == 0)
               {
                     if (!$this->check_img_type($files['type']))
                     {
                           $msg='上传的图片类型不对!';
                       }
                }
                elseif ($files['error'] == 1)
               {
                      $msg="上传图片太大,最大为$php_maxsize";
                }
                elseif ($files['error'] == 2)
               {
                      $msg="上传的图片超过$htm_maxsize";
                 }
			}

	  }
	 function get_filetype($path)
    {
        $pos = strrpos($path, '.');//从右边扫
        if ($pos !== false)
        {
            return substr($path, $pos);
        }
        else
        {
            return '';
        }
    }
	function check_img_type($imgtype)
	{
		switch($imgtype){
		 case'image/pjpeg':
		 case'image/gif':
		 case'image/png':
		 case 'swf':
		}
		return 1;
	}

}
?>