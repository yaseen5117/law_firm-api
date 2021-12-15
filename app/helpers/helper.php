<?php

function storeFile($orignalFile, $id, $folder)
{
    
    try {
        $fileName = md5(microtime()) . '.' . $orignalFile->getClientOriginalExtension();
        $orignalFile->storeAs($folder . '/' . $id, $fileName);
        return $fileName;
    } catch (\Throwable $th) {
        return null;
    }
}