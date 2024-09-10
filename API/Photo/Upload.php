<?php

class Upload
{
    /*
        photo: 上傳的圖檔
        path: 要儲存的資料夾
        middle: 是否要另存中圖
        small: 是否要另存小圖
        mw, mh: 中圖的寬與高
        sw, sh: 小圖的寬與高
    */
    public function uploadPhoto($photo, $path, $middle = false, $mw = null, $mh = null, $small = false, $sw = null, $sh = null)
    {
        // 預設中圖與小圖的尺寸
        $mwidth = $mw ?? 490;
        $mheight = $mh ?? 490;
        $swidth = $sw ?? 80;
        $sheight = $sh ?? 80;

        // 如果指定的資料夾不存在，建立資料夾
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // 取得檔案副檔名
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION);

        // 生成檔名
        $fileName = date("Y_m_d_H_i_s") . "_" . uniqid() . "." . $ext;

        // 移動上傳的檔案
        move_uploaded_file($photo['tmp_name'], $path . '/' . $fileName);

        // 如果要另存中圖
        if ($middle) {
            // 建立 M 資料夾
            $middlePath = $path . "/M";
            if (!file_exists($middlePath)) {
                mkdir($middlePath, 0777, true);
            }
            // 生成中圖
            $resize = new Resize($middlePath . '/' . $fileName, $path . '/' . $fileName, $mwidth, $mheight, 0, 0, $ext);
        }

        // 如果要另存小圖
        if ($small) {
            // 建立 S 資料夾
            $smallPath = $path . "/S";
            if (!file_exists($smallPath)) {
                mkdir($smallPath, 0777, true);
            }
            // 生成小圖
            $resize = new Resize($smallPath . '/' . $fileName, $path . '/' . $fileName, $swidth, $sheight, 0, 0, $ext);
        }

        // 回傳檔案名稱
        return $fileName;
    }
}
class Resize
{
    var $type;
    var $width;
    var $height;
    var $resize_width;
    var $resize_height;
    var $cut;
    var $enlarge;
    var $srcimg;
    var $dstimg;
    var $im;
    var $status;

    public function __construct($img, $imgsrc, $width, $height, $cut, $enlarge, $type)
    {
        $this->dstimg = $img;
        $this->srcimg = $imgsrc;
        $this->resize_width = $width;
        $this->resize_height = $height;
        $this->cut = $cut;
        $this->enlarge = $enlarge;

        // 根據檔案類型載入圖檔
        if (strtolower($type) == "png") {
            $this->im = imagecreatefrompng($this->srcimg);
        } else {
            $this->im = imagecreatefromjpeg($this->srcimg);
        }

        $this->width = imagesx($this->im);
        $this->height = imagesy($this->im);

        // 生成新圖檔
        $this->newimg();

        // 釋放內存
        ImageDestroy($this->im);
    }

    function newimg()
    {
        // 是否進行裁圖處理
        if ($this->cut == "1") {
            $resize_width = $this->resize_width;
            $resize_height = $this->resize_height;
            $resize_ratio = $resize_width / $resize_height;
            $ratio = $this->width / $this->height;

            $newimg = imagecreatetruecolor($resize_width, $resize_height);
            if ($this->type == 'image/png') {
                $white = imagecolorallocatealpha($newimg, 0, 0, 0, 127); // 完全透明顏色
                imagealphablending($newimg, false);
                imagefill($newimg, 0, 0, $white);
                imagesavealpha($newimg, true);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, ($this->height * $resize_ratio), $this->height);
                $this->status = imagepng($newimg, $this->dstimg);
            } else {
                $white = imagecolorallocate($newimg, 255, 255, 255);
                imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, ($this->height * $resize_ratio), $this->height);
                $this->status = imagejpeg($newimg, $this->dstimg, 80);
            }
        } else {
            // 不裁圖，保持比例
            $ratio = $this->width / $this->height;

            if ($this->width >= $this->height) { // 寬圖
                $resize_width = $this->resize_width;
                $resize_height = $resize_width / $ratio;
            } else { // 高圖
                $resize_height = $this->resize_height;
                $resize_width = $resize_height * $ratio;
            }

            $newimg = imagecreatetruecolor($resize_width, $resize_height);
            if ($this->type == 'image/png') {
                $white = imagecolorallocatealpha($newimg, 0, 0, 0, 127);
                imagealphablending($newimg, false);
                imagefill($newimg, 0, 0, $white);
                imagesavealpha($newimg, true);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, $this->width, $this->height);
                $this->status = imagepng($newimg, $this->dstimg);
            } else {
                $white = imagecolorallocate($newimg, 255, 255, 255);
                imagefilledrectangle($newimg, 0, 0, $resize_width, $resize_height, $white);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $resize_width, $resize_height, $this->width, $this->height);
                $this->status = imagejpeg($newimg, $this->dstimg, 80);
            }
        }
    }
}
