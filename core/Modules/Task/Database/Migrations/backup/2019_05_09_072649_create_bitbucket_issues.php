                                                                                                                                         <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbucketIssues extends Migration



{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bitbucket_issues', function ($table) {
            $table->increments('id');
            $table->string('title');            
            $table->integer('type')->unsigned();
            $table->string('priority');           
            $table->dateTime('deadline');
            $table->time('hourse');         
            $table->string('status');           
            $table->string('bitbucket_repo_id');
            // $table->string('reported_by');       
            

        });
    }


     
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitbucket_issues');
    }
}





