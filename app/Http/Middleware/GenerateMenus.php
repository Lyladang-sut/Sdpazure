<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('Navigation', function ($menu) {
        if(\Auth::user()):
            if(\Auth::user()->role == 'User' || \Auth::user()->role == 'SDP' || \Auth::user()->role == 'Administrator'):
                $menu->add('សិក្ខាកាម | Trainee', 'trainee', ['route'  => 'trainee.index'])->nickname('trainee')->before('fas fa-users');
                $menu->get('trainee')->add('បញ្ជីសិក្ខាកាម / All Trainees',  ['route'  => 'trainee.index']);
                $menu->get('trainee')->add('បង្កើតសិក្ខាកាម / New Trainee',  ['route'  => 'trainee.create']);

                $menu->add('សហគ្រាស | Enterprise', 'enterprise')->nickname('enterprise')->before('fas fa-cog');
                $menu->get('enterprise')->add('បញ្ជីសហគ្រាស | All Enterprises',  ['route'  => 'enterprise.index']);
                $menu->get('enterprise')->add('បង្កើតសហគ្រាស | New Enterprise',  ['route'  => 'enterprise.create']);

                $menu->add('វិស័យឯកជន | PS Participants', 'industry')->nickname('industry')->before('fas fa-user-cog');
                $menu->get('industry')->add('វិស័យឯកជន | PS Participant List',  ['route'  => 'industry.index']);
                $menu->get('industry')->add(' បង្កើតវិស័យឯកជន | New PS Participant',  ['route'  => 'industry.create']);
            endif; 
            if(\Auth::user()->role == 'SDP' || \Auth::user()->role == 'Administrator'):

                $menu->add('Training Provider', 'provider')->nickname('provider')->before('glyphicon glyphicon-list');
                $menu->get('provider')->add('បញ្ជីអ្ន​កបណ្ដុះបណ្ដាល | All Providers',  ['route'  => 'provider.index']);
                $menu->get('provider')->add('បង្កើតអ្នកបណ្ដុះបណ្ដាល | New Provider',  ['route'  => 'provider.create']);
                
                $menu->add('TOT', 'tot')->nickname('tot')->before('glyphicon glyphicon-list');
                $menu->get('tot')->add('បញ្ជឺ   | All TOTs',  ['route'  => 'tot.index']);
                $menu->get('tot')->add('បង្កើត | New TOT',  ['route'  => 'tot.create']);

                $menu->add('TOA', 'toa')->nickname('toa')->before('glyphicon glyphicon-list');
                $menu->get('toa')->add('បញ្ជឺ | All TOAs',  ['route'  => 'toa.index']);
                $menu->get('toa')->add('បង្កើត | New TOA',  ['route'  => 'toa.create']);

                $menu->add('RPL', 'rpl')->nickname('rpl')->before('glyphicon glyphicon-list');
                $menu->get('rpl')->add('បញ្ជឺ | All RPLs',  ['route'  => 'rpl.index']);
                $menu->get('rpl')->add('បង្កើត|  New RPL',  ['route'  => 'rpl.create']);
            endif;

            if(\Auth::user()->role == 'Administrator'):
                // $menu->add('Trainer Survey Learners', 'trainer-survey')->nickname('trainer-survey')->before('glyphicon glyphicon-pencil');
                // $menu->get('trainer-survey')->add('All Trainer Survey Learners',  ['route'  => 'trainer-survey.index']);
                // $menu->get('trainer-survey')->add('New Trainer Survey Learner',  ['route'  => 'trainer-survey.create']);

                // $menu->add('Course Survey Learners', 'course-survey')->nickname('course-survey')->before('glyphicon glyphicon-pencil');
                // $menu->get('course-survey')->add('All Course Survey Learners',  ['route'  => 'course-survey.index']);
                // $menu->get('course-survey')->add('New Course Survey Learners',  ['route'  => 'course-survey.create']);

                $menu->add('Manual Result Entry', 'manual-result')->nickname('manual-result')->before('glyphicon glyphicon-pencil');
                $menu->get('manual-result')->add('All Manual Result Entry',  ['route'  => 'manual-result.index']);
                $menu->get('manual-result')->add('New Manual Result Entry',  ['route'  => 'manual-result.create']);
                $menu->add('User', 'user')->nickname('user')->before('glyphicon glyphicon-user');
                $menu->get('user')->add('All Users',  ['route'  => 'user.index']);
                $menu->get('user')->add('New user',  ['route'  => 'user.create']);
            endif;
        endif;
        });
        return $next($request);
    }
}
