<?php

if (!function_exists('error')) {
    /**
     * @param int $status
     * @param string $message
     * @param array|string $data
     */
    function error($message = '', array $data = [], $status = 0)
    {
        $result['status'] = $status;
        $message === '' || $result['message'] = $message;
        (!is_array($data) || count($data) === 0) || $result['result'] = $data;
        showResult($result);
    }
}

if (!function_exists('success')) {
    /**
     * @param string $message
     * @param array|string $data
     */
    function success($message = '', array $data = array())
    {
        $result['status'] = 1;
        $message === '' || $result['message'] = $message;
        (!is_array($data) || count($data) === 0) || $result['result'] = $data;
        showResult($result);
    }
}

if (!function_exists('showResult')) {
    /**
     * @param $result
     * @return \Illuminate\Http\JsonResponse
     */
    function showResult($result)
    {
        echo json_encode($result);
        exit;
    }
}

if (!function_exists('getAuthKey')) {
    /**
     * @return String
     */
    function getAuthKey()
    {
        return base64_encode(uniqid('api_token', true) . time());
    }
}

if (!function_exists('getVerificationCode')) {
    /**
     * @param string $for
     * @param int $digits
     * @param array $exceptCodes
     * @return String
     */
    function getVerificationCode($for = 'email', $digits = 6, array $exceptCodes = [])
    {
        if ('email' === $for) {
            $verificationCode = md5(time());
        } else {
            do {
                $verificationCode = mt_rand(0, (int)str_repeat(9, $digits));
            } while (in_array($verificationCode, $exceptCodes));
            $verificationCode = str_pad($verificationCode, $digits, 0, STR_PAD_LEFT);
        }
        return $verificationCode;
    }
}

function validateAndUploadFile(\Illuminate\Http\Request $request, $destinationKey = 'USERS_AVATAR_UPLOAD_DIR', $key = 'photo', $oldFile = null)
{
    $fileName = null;
    if ($request->hasFile($key)) {
        $file = $request->file($key);
        if ($file->isValid()) {
            $fileName = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = storage_path('app/public/' . env($destinationKey));
            $file->move($destination, $fileName);
            symlink($destination . $fileName, public_path('storage/' . $fileName));
            !$oldFile || !file_exists($destination . $oldFile) || unlink($destination . $oldFile);
        }
    }
    return $fileName;
}

function S3UploadFile(\Illuminate\Http\Request $request, $key = 'photo')
{
    $fileName = null;
    if ($request->hasFile($key)) {
        $file = $request->file($key);
        if ($file->isValid()) {

            $s3 = \Storage::disk('s3');
            $fileName = $key . '_' . time() . '.' . $file->getClientOriginalExtension();

            $s3->put($fileName, file_get_contents($file->getRealPath()), 'public');
        }
    }
    return (string) $s3->url($fileName);
}

function formatCurrency($input)
{
    $suffixes = array('', 'k', 'm', 'g', 't');
    $suffixIndex = 0;

    while(abs($input) >= 1000 && $suffixIndex < count($suffixes)) {
        $suffixIndex++;
        $input /= 1000;
    }

    return ($input > 0 ? floor($input * 1000) / 1000 : ceil($input * 1000) / 1000) . $suffixes[$suffixIndex];
}
