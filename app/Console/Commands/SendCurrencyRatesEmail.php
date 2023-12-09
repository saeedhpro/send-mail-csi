<?php

namespace App\Console\Commands;

use App\Mail\CurrencyRatesEmail;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCurrencyRatesEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-currency-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send currency rates email to all users every 2 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new Client();
        $response = $client->get('http://csi.parsijoo.ir'); // ارسال درخواست به وب سرویس

        $currencyRates = json_decode($response->getBody(), true);

        $users = User::all(); // فرض کنید که اطلاعات کاربران در جدول Users ذخیره شده است

        foreach ($users as $user) {
            Mail::to($user->email)->send(new CurrencyRatesEmail($currencyRates));
        }

        $this->info('Currency rates email sent successfully.');    }
}
