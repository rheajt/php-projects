<?php 

class User {
    
    function __construct($fn, $ln, $em, $class, $gen) {
        $this->first_name = $fn;
        $this->last_name = $ln;
        $this->email = $em;
        $this->char_class = $class;
        $this->title = $this->getTitle();
        $this->avatar = $this->saveAvatar($gen);
    }

    function saveAvatar($sex) {

        $dir = 'large-avs';
        $files = opendir($dir);
        
        if ($sex == 'male') {
            while($file = readdir($files)) {
                if($file != '.' && $file != '..') {
                    if (preg_match('/pattern/', $file)) {
                        $this->patterns[] = $dir."/".$file;
                        shuffle($this->patterns);
                    } elseif (preg_match('/head_m/', $file)) {
                        $this->heads[] = $dir."/".$file;
                        shuffle($this->heads);
                    } elseif (preg_match('/eye_m/', $file)) {
                        $this->eyes[] = $dir."/".$file;
                        shuffle($this->eyes);
                    } elseif (preg_match('/hair_m/', $file)) {
                        $this->hairs[] = $dir."/".$file;
                        shuffle($this->hairs);
                    } elseif (preg_match('/mouth_m/', $file)) {
                        $this->mouths[] = $dir."/".$file;
                        shuffle($this->mouths);
                    } elseif (preg_match('/accessory_/', $file)) {
                        $this->accs[] = $dir."/".$file;
                        shuffle($this->accs);
                    } elseif (preg_match('/beard_/', $file)) {
                        $this->beards[] = $dir."/".$file;
                        shuffle($this->beards);
                    }
                }
            } // end of the while loop that opens all the avatar files
        } else {
            while($file = readdir($files)) {
                if($file != '.' && $file != '..') {
                    if (preg_match('/pattern/', $file)) {
                        $this->patterns[] = $dir."/".$file;
                        shuffle($this->patterns);
                    } elseif (preg_match('/head_f/', $file)) {
                        $this->heads[] = $dir."/".$file;
                        shuffle($this->heads);
                    } elseif (preg_match('/eye_f/', $file)) {
                        $this->eyes[] = $dir."/".$file;
                        shuffle($this->eyes);
                    } elseif (preg_match('/hair_f/', $file)) {
                        $this->hairs[] = $dir."/".$file;
                        shuffle($this->hairs);
                    } elseif (preg_match('/mouth_f/', $file)) {
                        $this->mouths[] = $dir."/".$file;
                        shuffle($this->mouths);
                    } elseif (preg_match('/accessory_/', $file)) {
                        $this->accs[] = $dir."/".$file;
                        shuffle($this->accs);
                    } 
                }
            }
        }
        closedir($files);

        $image_1 = imagecreatefrompng($this->heads[0]);
        $image_2 = imagecreatefrompng($this->hairs[0]);
        $image_3 = imagecreatefrompng($this->eyes[0]);
        $image_4 = imagecreatefrompng($this->mouths[0]);
        imagealphablending($image_1, true);
        imagesavealpha($image_1, true);
        imagecopy($image_1, $image_2, 0, 0, 0, 0, 400, 400);
        imagecopy($image_1, $image_3, 0, 0, 0, 0, 400, 400);
        imagecopy($image_1, $image_4, 0, 0, 0, 0, 400, 400);

        // save avatar name
        $filename = 'avatars/'.$this->first_name.'_'.$this->last_name.'.png';
        imagepng($image_1, $filename);

        return $filename;

    }

    function getTitle() {
        return $this->first_name.' '.$this->last_name.' the '.$this->char_class;
    }

}