<?php

namespace App\Mail;

use App\Models\Bericht;
use App\Models\BerichtText;
use App\Models\Einsatzmittel;
use App\Models\Job;
use App\Models\PersonalBericht;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Einsatzbericht extends Mailable
{
    use Queueable, SerializesModels;

    public $bericht;
    public $personalBerichts;
    public $einsatzmittel;
    public $users;
    public $jobs;
    public $berichtTexts;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bericht $bericht)
    {
        $this->bericht = $bericht;
        $this->personalBerichts = PersonalBericht::where('bericht',$bericht->cis_row_id)->orderBy('job')->get();
        $this->einsatzmittel = Einsatzmittel::all();
        $this->users = User::all();
        $this->jobs = Job::all();
        $this->berichtTexts = BerichtText::where('cis_row_id_bericht',$bericht->cis_row_id)->get();
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('intranet@ff-dotzheim.de','FF-Dotzheim - Intranet'),
            subject: 'Neuer Einsatzbericht',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.einsatzbericht',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
