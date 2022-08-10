<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GCommision;
use App\Models\Fuser;
use App\Http\Traits\GcronTrait;
class GenerationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    use GcronTrait;
    protected $signature = 'add:bonus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $all_user=Fuser::all();
        foreach($all_user as $user)
        {
            // $g_comm=GCommision::where('fuser_id',$user->id)->get();
            $newgen=$this->GetGeneration($user->id);

            for($i=1;$i<=17;$i++){
                $gen=GCommision::where('fuser_id',$user->id)->where('gen',$i)->first();
                $gen->comission=floatval($gen->comission ==null? 0 : $gen->comission )+floatval($newgen['gen'.$i]);
                $gen->save();
            }

        }
        return 0;
    }
}
