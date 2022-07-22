<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

abstract class GeneralHelper
{
    /**
     * @package
     * @author Shaarif <shaarifsabah5299@gmail.com>
     */

    # Global Error Message
    private const ERROR_MESSAGE   = 'Something went wrong.';


    /**
     * Generate Random String
     *
     * @param $length
     *
     * @return string
     */
    public static function STR_RANDOM($length): string
    {
        return Str::random($length);
    }

    /**
     * Remove Existing File
     *
     * @param string $filepath
     *
     * @return bool
     */
    public static function REMOVE_FILE(string $filepath): bool
    {
        return @unlink( $filepath ?? '' );
    }

    /**
     * Create New Directory
     *
     * @param string $name
     *
     * @return bool
     */
    public static function MAKE_DIR(string $name): bool
    {
        if (!Storage::disk('public')->exists($name)) {
            Storage::disk('public')->makeDirectory($name);
        }

        return true;
    }

    /**
     * Upload Given File
     *
     * @param object $file
     * @param string $path
     * @param bool   $rename
     * @param bool   $unlink
     * @param string|null $oldPath
     *
     * @return bool|string
     */
    public static function UPLOAD_FILE(object $file, string $path, $rename = true, bool $unlink = false, string $oldPath = null)
    {
        $name = $rename ? self::STR_RANDOM(10).'-'.time() . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName();
        if(self::MAKE_DIR($path))
        {

            Storage::disk('public')->putFileAs($path, $file, $name);
            $full_image_name = '/storage/' . $path . '/' . $name;
            !$unlink ?: self::REMOVE_FILE($oldPath);
            return $full_image_name;
        }

        return false;
    }

    /**
     * Success Response
     *
     * @param $data
     * @param $route
     * @param $sucMsg
     *
     * @return RedirectResponse
     */
    public static function SUCCESS($data, $route, $sucMsg = null)
    {
        $data = [
            'message'    => $sucMsg ?? '',
            'alert_type' => 'success',
            'data'       => $data
        ];

        return $route
            ? redirect()->route($route)->with($data)
            : redirect()->back()->with($data);
    }

    /**
     * Error Response
     *
     * @param $data
     * @param $route
     * @param $errMsg
     *
     * @return RedirectResponse
     */
    public static function ERROR($data, $route, $errMsg = null)
    {
        $data = [
            'message'    => $errMsg ?? self::ERROR_MESSAGE,
            'alert_type' => 'error',
            'data'       => $data
        ];

        return $route
            ? redirect()->route($route)->with($data)
            : redirect()->back()->with($data);
    }

    /**
     * User Request Response
     *
     * @param Request $request
     * @param         $data
     * @param string|null $sucMsg
     * @param string|null $route
     * @param string|null $errMsg
     * @param $totals
     *
     * @return JsonResponse|RedirectResponse
     */
    public static function SEND_RESPONSE(Request $request, $data, string $route = null, string $sucMsg = null, string $errMsg = null, $totals = 0)
    {

        // Send Api Response
        if($request->ajax())
        {
            return $data
                ? response()->json([
                    'message'    => $sucMsg,
                    'status'     => true,
                    'alert_type' => 'success',
                    'data'       => $data,
                    'total'      => $totals ?? 0,
                    'url'        => $route ? route($route) : null
                ])
                : response()->json([
                    'message'    => $errMsg ?? 'Something went wrong.',
                    'status'     => false,
                    'alert_type' => 'error',
                    'data'       => $data,
                    'url'        => $route ? route($route) : null
                ]);
        }

        // Send Web Response
        return $data
            ? self::SUCCESS($data, $route ?? null, $sucMsg)
            : self::ERROR($data, $route ?? null, $errMsg);
    }

}
