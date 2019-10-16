<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function setShow(File $file){

        if($file->show == 0){
            $file->show = 1;
        } else {
            $file->show = 0;
        }
        $file->save();
        return redirect()->route('groups.show', $file->lecture->group_id);

    }

    public function delete(File $file){
        $lecture= $file->lecture_id;
        \Storage::delete($file->file);
        $file->delete();
        return redirect()->route('lectures.edit', $lecture);

    }
}
