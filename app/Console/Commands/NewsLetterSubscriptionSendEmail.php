<?php

namespace App\Console\Commands;

use App\Models\NewsLetterSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class NewsLetterSubscriptionSendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Newsletter Subscription Upcoming Sounds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            $newsletters = NewsLetterSubscription::where('status',1)->get();
            if(isset($newsletters)){
                foreach ($newsletters as $newsletter){
                    $this->info('Processed NewsletterID: '.$newsletter->id);
                    $email = new \SendGrid\Mail\Mail();
                    $email->setFrom( "info@upcomingsounds.com", "News Letter Upcoming Sounds" );
                    $email->addTo($newsletter->email, "News Letter" );
                    $email->setTemplateId(
                        new \SendGrid\Mail\TemplateId( 'd-37e1d0fbc45d46e6bd30cb380e959f70' )
                    );

                    // === Here comes the dynamic template data! ===
                    $email->addDynamicTemplateDatas( [
                        'variable1'     => 'Some stuff',
                        'templatesRock' => 'They sure do!'
                    ] );
                    $sendgrid_key = Config::get('services.Sendgrid.SENDGRID_API_KEY');
                    $sendgrid = new \SendGrid($sendgrid_key);

                    $response = $sendgrid->send( $email );
                    $this->info('Processed Response: '.$response->statusCode());
                }
            }
        }catch (\Exception $exception){
            $this->info('Some error occurred while News Letter Subscription: '.$exception->getMessage());
        }
    }
}
