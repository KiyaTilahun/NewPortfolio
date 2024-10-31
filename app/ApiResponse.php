<?php

namespace App;

trait ApiResponse
{
    //
    protected function ok($message, $data)
    {


        return $this->success($message, $data, 200);
    }
    protected function success($message, $data, $statuscode = 200)
    {


        return response()->json([
            "data" => $data,
            "message" => $message,
            "status" => $statuscode
        ], $statuscode);
    }

    protected function error($message, $statuscode=404)
    {


        return response()->json(["message" => $message, "status" => $statuscode], $statuscode);
    }
}
