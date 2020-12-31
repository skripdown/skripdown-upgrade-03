<?php
/** @noinspection PhpUndefinedMethodInspection */
/** @noinspection PhpUnhandledExceptionInspection */

/** @noinspection PhpUndefinedClassInspection */


namespace App\Http\back;
use A6digital\Image\DefaultProfileImage;
use Illuminate\Support\Facades\Storage;
use Image;

class _Image {
    private static $path = [
        'transaction' => 'app/public/client/transaction/',
        'profile' => 'app/public/client/profile/',
        'developer_profile' => 'app/public/developer/profile/'
    ];

    public static $public_path = [
        'transaction' => 'storage/client/transaction/',
        'profile' => 'storage/client/transaction/',
        'developer_profile' => 'storage/developer/profile/',
    ];

    private static $palette = [
        '#0275d8', '#5cb85c', '#f0ad4e',
        '#d9534f','#0b5a79','#98a48a',
        '#7681de','#f8b93c','#a3cb05',
        '#279546','#a63642','#d61a43',
        '#cc6654','#db7b47','#766063'
    ];

    public static function setTransaction($file, $identity, $plan): string {
        $filename = 'tr'.time().$identity.$plan.'.'.$file->getClientOriginalExtension();
        $filepath = self::$path['transaction'].$filename;
        self::save($file, $filepath);
        return $filename;
    }

    public static function setProfile($file, $identity, $role = 'und'):string {
        $filename = time().$identity.$role.'.'.$file->getClientOriginalExtension();
        self::save($file,self::$path['profile'].$filename,false,true);
        return $filename;
    }

    public static function setDefaultProfile($name, $identity, $role = 'und',$dev = false): string {
        $length = count(self::$palette);
        $name   = explode(' ', $name);
        if (count($name) > 1)
            $name = $name[0].' '.$name[1];
        else
            $name = $name[0];
        try {
            $img = DefaultProfileImage::create($name, 350, self::$palette[rand(0, $length - 1)], '#fff');
            $filename = time().$identity.$role.'.png';
            $path = self::$path['profile'];
            if ($dev) $path = self::$path['developer_profile'];
            self::save($img->encode(),$path.$filename,true);
        } catch (Exception $e) {
            return 'ERROR!';
        }
        return $filename;
    }

    private static function save($file, $filepath, $resize = false, $corp = false) {
        $img = Image::make($file);
        if ($resize) $img->resize(350,350);
        if ($corp) $img->fit(350,350);

        $img->save(storage_path($filepath));
    }

    public static function remove($filename, $path) {
        if (Storage::exists(self::$path[$path].$filename)) {
            Storage::delete(self::$path[$path].$filename);
        }
    }
}
