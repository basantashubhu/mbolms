<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('loans')->delete();
        
        \DB::table('loans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'loan_type' => 'HL',
                'amount' => '18000000.00',
                'interest_rate' => '8.00',
                'duration' => '30.00',
                'installment' => '54000.00',
                'criteria' => '<p>If you have equity in your home, you might be able to use a home equity loan, also known as a second mortgage. The equity you have in your home&mdash;the portion of your home that you own, and not the bank&mdash;secures the loan. You can typically borrow up to 85% of your home&rsquo;s equity, which is paid out as a lump sum amount and repaid over five to 30 years.</p>
<p><br></p>
<p>To find out your home&rsquo;s equity, simply subtract your mortgage balance from your home&rsquo;s assessed value. For example, if you owe $150,000 on your mortgage and your home is worth $250,000, then your equity is $100,000. Considering the 85% loan limit rule, and depending on your lender, you could potentially borrow up to $85,000 with $100,000 in equity.</p>',
                'created_at' => '2022-04-09 12:12:26',
                'updated_at' => '2022-04-09 12:12:26',
            ),
            1 => 
            array (
                'id' => 2,
                'loan_type' => 'PL',
                'amount' => '500000.00',
                'interest_rate' => '11.00',
                'duration' => '8.00',
                'installment' => '5781.25',
                'criteria' => '<p><strong>Personal loans</strong> are the broadest type of loan category and typically have repayment terms between 24 and 84 months. They can be used for just about anything except for a college education or illegal activities. People commonly use personal loans for things like:</p>
<p><br></p>
<p>Personal loans generally come in two forms: secured and unsecured. Secured loans are backed by collateral&mdash;such as a savings account or a vehicle&mdash;that a lender can take back if you don&rsquo;t repay your full loan amount.</p>
<p><br></p>
<p>Unsecured loans, on the other hand, require no collateral and are backed by your signature alone, hence their alternate name: signature loans. Unsecured loans tend to be more expensive and require better credit because the lender takes on more risk.</p>
<p><br></p>
<p>Applying for a personal loan is easy, and typically can be done online through a bank, credit union or online lender. Borrowers with excellent credit can qualify for the best personal loans, which come with low interest rates and a range of repayment options.</p>',
                'created_at' => '2022-04-09 12:13:14',
                'updated_at' => '2022-04-09 12:13:14',
            ),
            2 => 
            array (
                'id' => 3,
                'loan_type' => 'CL',
                'amount' => '1500000.00',
                'interest_rate' => '12.00',
                'duration' => '7.00',
                'installment' => '20000.00',
                'criteria' => '<p><strong>Car loans</strong> are a type of secured loan that you can use to buy a vehicle with repayment terms between three to seven years. In this case, the collateral for the loan is the vehicle itself. If you don&rsquo;t pay, the lender will repossess the car.</p>
<p><br></p>
<p>You can typically get auto loans from credit unions, banks, online lenders and even car dealerships. Some car dealerships have a financing department where they help you find the best loan from partner lenders. Others operate as &ldquo;buy-here-pay-here&rdquo; lenders, where the dealership itself gives you the loan. These tend to be much more expensive, though.</p>',
                'created_at' => '2022-04-09 12:15:15',
                'updated_at' => '2022-04-09 12:15:15',
            ),
            3 => 
            array (
                'id' => 4,
                'loan_type' => 'EL',
                'amount' => '600000.00',
                'interest_rate' => '10.00',
                'duration' => '5.00',
                'installment' => '11000.00',
                'criteria' => '<p><strong>Education loans</strong> are meant to pay for tuition, fees and living expenses at accredited schools. This means that you generally can&rsquo;t use student loans to pay for specific types of education, such as coding bootcamps or informal classes.</p>
<p><br></p>
<p>There are two types of student loans: federal and private. You get federal student loans by filling out the Free Application for Federal Student Aid (FAFSA) and working with your school&rsquo;s financial aid department. Federal student loans generally come with more protections and benefits but charge slightly higher interest rates. Private student loans come with much fewer protections and benefits, but if your credit is good, you could qualify for better rates.</p>',
                'created_at' => '2022-04-09 12:17:48',
                'updated_at' => '2022-04-09 12:17:48',
            ),
        ));
        
        
    }
}