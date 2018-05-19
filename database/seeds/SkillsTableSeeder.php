<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->delete();
        $skills = array('French', 'Spanish', 'Blog Content', 'Social Media', 'WordPress', 'Drupal', 'Web Design', 'Salesforce', 'Confluence', 'Agile', 'Aha!', 'Rally', 'Python', 'SQL', 'Laravel', 'Creative Cloud', 'Speechwriting', 'Proofreading', 'Editing', 'Sales Strategy', 'Project Management', 'CRM', 'Explainer Videos', 'Animation', 'Forecasting', 'Excel', 'SmartSheet', 'Pivot Tables', 'Query', 'Data Lake', 'Marketing', 'Finance', 'Visualization', 'Tableau', 'Data Mining', 'Logo', 'Design Thinking', 'Print Media', 'Icon Design', 'Jenkins', 'PHP', 'DevOps', 'Testing', 'UI Decoupling', 'UX/UI', 'User Experience', 'User Interface', 'Javascript', 'HTML', 'CSS', 'Prototyping', 'Graphic Design', 'Wireframes', 'Axure', 'InVision', 'Channel Marketing', 'QMI', 'Research', 'Accounting', 'Project Finance', 'Supply Chain', 'Sourcing', 'SaaS', 'Full-Stack', 'Back-end', 'Front-end', 'Communication', 'Audit', 'Data Processing', 'Cost Reduction', 'Compliance', 'Econometrics', 'Statistical Analysis', 'R', 'MatLab', 'GAAP', 'Mergers', 'Acquisitions', 'M&A', 'Financial Modeling', 'Profit and Loss', 'Quantitative Analysis', 'Qualitative Analysis', 'Reconciliation', 'Restructuring', 'ERP', 'Data Quality', 'Strategic Planning', 'Risk Management', 'Tax', 'Wealth Management', 'Valuations', 'Reporting', 'Dashboards', 'Securities', 'Bonds', 'Risk Analysis', 'Portfolio Management', 'FinTech', 'Product Development', 'Product Management', 'Product Testing', 'User Testing', 'Market Testing', 'Documentation', 'Legal', 'PowerPoint', 'Keynote', 'Systems Design', 'Cyber Security', 'Architecture', 'Cloud Security', 'AWS', 'Networks', 'Ruby', 'Automation', 'Six Sigma', 'LEAN', 'Process Engineering', 'Consulting', 'Data Cleaning', 'Enterprise Architecture', 'Solutions Architecture', 'Proof of Concept', 'MVP', 'Scrum');
        foreach ($skills as $skillName){
            $skill = ['name' => $skillName];
            Skill::create($skill);
        }
        //factory(App\Skill::class, 1000)->create();
    }
}
