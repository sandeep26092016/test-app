# Mini-Aspire Loan App

A Laravel app that helps user to apply for loan for a specific term period and then repay the part of amount every week for approved the loan application. Default approved

This app consists of three different modules,

### Authentication/login

Contains registration, login and logout functionality for users. App uses [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) for token based authentication system. When user registers or perform login operation, app will return auth token in the response that can be used to authorize protected APIs later.

### Loan application

Contains logic to create, update, delete and approve loan. Loan applications are created by user. Create repayment entries according to calculations.

### Loan repayments

Contains logic to get pending/paid loan repayments and repay a specific repayment. Loan repayment approved the loan application. Once loan repayment records are created, user can fetch the list of repayments for a specific loan application and then repay a particular repayment. Currently, app assumes a weekly repayment frequency.


## Project structure DFD
[Mini-Aspire-Loan.drawio.png](https://github.com/sandeep26092016/test-app/blob/main/Mini-Aspire-Loan.drawio.png)

I have used laravel sail for development

## Installation

After git pull on local

execute below command outside git folder

```
curl -s https://laravel.build/test-app | bash
cd test-app && ./vendor/bin/sail up
```

You may need to hit ./vendor/bin/sail up 
multiple times it takes time initially once setup it will start fast next timeonwards



## Postman collection

[Mini-Aspire.postman_collection.json](https://github.com/sandeep26092016/test-app/blob/main/Mini-Aspire.postman_collection.json)

I have setup token variable in collection which is set once you call login api and then after it will set to all api header

## Test users

After localhost running you can execute below command to seed user 

```
./vendor/bin/sail artisan db:seed --class=UsersTableSeeder
```


