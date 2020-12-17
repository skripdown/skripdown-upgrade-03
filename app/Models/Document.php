<?php
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Models;

use App\Http\back\_Authorize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;

    public static function findOrCreate($id) {
        $auth = _Authorize::data();
        $foreign = $auth->role.'_id';
        if (Document::all()->where($foreign,$id,)->count() == 0
            && $foreign == 'student_id') {
            $title    = 'Judul';
            $student  = Student::findOrCreate($auth->identity);
            $document = new Document();
            $document->student_id    = $student->id;
            $document->department_id = $student->department_id;
            $document->faculty_id    = $student->faculty_id;
            $document->super_id      = $student->super_id;
            $document->tenplate_id   = $student->super->templates->id;
            $document->title         = $title;
            $document->url           = self::url($student->id,$student->super_id);
            $document->meta_content  = self::meta($student);
            $document->content       = self::content($title,array('start writing now. 😉','SKRIPDOWN : fast end thesis writing'));
            $document->save();
        }

        return Document::all()->where($foreign,$id)->first();
    }

    private static function url($student_id, $super_id): string{
        $alphabet = 'abcdefghi__--jklmnopqrstuvwxyz__--ABCDEFGHIJK__--LMNOPQRSTUVWXYZ0123456789_-';
        $url      = ''.$student_id;
        $length   = strlen($alphabet);
        for ($i = 0; $i < 20; $i++) {
            $url .= $alphabet[rand(0, $length - 1)];
        }
        $url      = date("s").date("h").$url;
        $url     .= $super_id;
        return $url;
    }

    private static function meta($student_model): string {
        return '<div>@author : '.$student_model->user->name.'</div>'
              . '<div>@id : '.$student_model->user->identity.'</div>'
              . '<div>@department : '.$student_model->user->department->name.'</div>'
              . '<div>@faculty : '.$student_model->user->faculty->name.'</div>'
              . '<div>@university : '.$student_model->user->super->name.'</div>'
              . '<div>@citation : APA</div>'
              . '<div>@watermark : on</div>'
              . '<div>@preface : default</div>'
              . '<div>@date : '.self::date('d-m-Y').'</div>'
              . '<div>@location : malang</div>';
    }

    private static function content($title , $comments = ''): string {
        $result = '';
        if ($comments != '') {
            foreach ($comments as $comment) {
                $result .= '<div>//'.$comment.'</div>';
            }
        }
        return $result.'<div><br></div><div>'.$title.'</div>';
    }

    public function advises(): HasMany
    {
        return $this->hasMany(Advise::class);
    }

    public function proposals(): HasMany
    {
        return $this->hasMany(Proposal::class);
    }

    public function rejected_proposals(): HasMany
    {
        return $this->hasMany(RejectedProposal::class);
    }

    public function document_keywords(): HasMany
    {
        return $this->hasMany(DocumentKeyword::class);
    }

    public function exam(): HasOne
    {
        return $this->hasOne(Exam::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function super(): BelongsTo
    {
        return $this->belongsTo(Super::class);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
