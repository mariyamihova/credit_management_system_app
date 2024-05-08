This is simple credit management app in Laravel v. 9.52.16, which is contains the following:
1. Form for creation of a new credit with the following fields:
  - name of credit holder
  - amount (in BGN)
  - period (from 3 to 120 months)

2. A list of all credits in a table. Each credit is on a new row in the table and the columns of the table are "credit holder", "amount", "period" and "monthly payment"

3. Form for creation of a new payment for given credit. It contains the following fields:
  - select menu - list of all credits
  - amount (in BGN)
    
Conditions:

- When starting the app, the list of credits to be shown
- Each credit has its own identification number, which follows common structure like 0000001, 0000002, 0000003 and so on
- The interest for all client is 7,9% for a year
- If a payment amount exceeds the remaining amount, which has to be paid, only the amount owed should be withdrawn and the user has to be notified
- One borrower cannot have loans with a total value of more than BGN 80,000.

  ====================================================================================================================================================================

**  In order to start the app, do the following:**
  
  1. Clone the project and add the .env with your database credentials
  2. Run composer install/composer update
  3. Run php artisan migrate to create the tables in the db
  4. Run php artisan serve to start the app


  
