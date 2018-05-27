<?php 

namespace App\Http\Controllers;

use App\Category;
use App\Location;
use App\Project;
use App\Review;
use App\Skill;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class ProjectController extends Controller 
{

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
      $projects = Project::where('start_date','>',Carbon::now())->where('complete','!=',true)->paginate(12);
      return view('projects/index',compact('projects'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $skills = Skill::orderBy('name')->take(1000)->get();
        $locations = Location::all();
        $categories = Category::all();
        return view('projects/create', compact('skills','locations','categories'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {
      //validate request input
      $validator = $request->validate(Project::$rules);

      //dd(Input::all());
      //create new project
      $project = new Project();

      //assign input to project data
      $project->title = Input::get('title');
      $project->user_id = Auth::id();
      $project->category_id = Input::get('category_id');
      $project->description = Input::get('description');
      $project->start_date = Carbon::parse(Input::get('start_date'));
      $project->deadline = Carbon::parse(Input::get('deadline'));
      $project->location_id = Input::get('location_id');
      $project->timezone = Input::get('timezone');
      $project->impact = Input::get('impact');
      $project->user_count = Input::get('user_count');
      $project->estimated_hours = Input::get('estimated_hours');
      $project->resources_link = Input::get('resources_link');
      $project->additional_info = Input::get('additional_info');
      if(Input::get('flexible_start')) {
          $project->flexible_start = true;
      }else{
          $project->flexible_start = false;
      }
      if(Input::get('on_site')) {
          $project->on_site = true;
      }else{
          $project->on_site = false;
      }
      if(Input::get('renew')) {
          $project->renew = true;
      }else{
          $project->renew = false;
      }
      //save project
      $project->save();

      //create associated acceptance criteria
      foreach (Input::get('acceptance_criteria') as $criteria){
          $project->AcceptanceCriteria()->create([
              'criteria' => $criteria
          ]);
      }
      //create associated skills
      foreach (explode(",",Input::get('skills')) as $skill){
          $project->Skills()->attach([
              'name' => $skill
          ]);
      }

      return redirect('/')->with('success','You have successfully posted your project');
    }

    /**
    * Display the specified resource.
    *
    * @param  Project  $project
    * @return View
    */
    public function show(Project $project)
    {
      $columns = 12/$project->user_count;
      return view('projects/view-gig-details',compact('project','columns'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id)
    {

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {

    }

    public function completeProject(Project $project){
        $project->complete = true;
        $project->save();
        foreach ($project->Users as $user){
            $userReview = new Review();
            $userReview->user_id = $user->id;
            $userReview->reviewer_id = $project->user_id;
            $userReview->project_id = $project->id;
            $userReview->review_type = 'User Review';
            $userReview->rating = $project->user_id;
            $userReview->save();
            $sponsorReview = new Review();
            $sponsorReview->user_id = $project->user_id;
            $sponsorReview->reviewer_id = $user->id;
            $sponsorReview->project_id = $project->id;
            $sponsorReview->review_type = 'Sponsor Review';
            $sponsorReview->rating = $project->user_id;
            $sponsorReview->save();
        }
        return redirect('/projects/'.$project->id)->with('success','You successfully completed the project');
    }

    public function joinProject(Project $project, User $user){
      $project->Users()->attach($user->id);
      return redirect('/projects/'.$project->id)->with('success','You successfully joined the project');
    }

    public function leaveProject(Project $project, User $user){
        $project->Users()->detach($user->id);
        return redirect('/projects/'.$project->id)->with('success','You successfully left the project');
    }

    public function search(){
      $term = Input::get('term');
      $projects = Project::search($term, null, true)->distinct()->paginate(12);
      return view('projects/index',compact('projects','term'));
    }

    /**
     * Favorite a particular project
     *
     * @param  Project $project
     * @return Response
     */
    public function favoriteProject($id)
    {
        $project = Project::find($id);

        Auth::user()->Favorites()->attach($project->id);

        return response()->json(['success'=>true],200);
    }

    /**
     * Unfavorite a particular project
     *
     * @param  Project $project
     * @return Response
     */
    public function unFavoriteProject($id)
    {
        $project = Project::find($id);

        Auth::user()->Favorites()->detach($project->id);

        return response()->json(['success'=>true],200);
    }
  
}

?>