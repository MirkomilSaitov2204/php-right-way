<?php

namespace App\Classes;

class Home
{
    public function index()
    {
        return "<form action='/upload' method='post' enctype='multipart/form-data'>  
                <input type='file' name='receipt'>
                <button type='submit'>Upload</button>
            </form>";
    }

    public function upload()
    {
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';

        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'] ;

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        var_dump(pathinfo($filePath));
    }
}