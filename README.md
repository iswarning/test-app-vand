## Run this command to install project:
composer install

## Run this command to make database:
php artisan migrate 

## Run this command to create dummy data:
php artisan db:seed

## Run this command to generate key:
php artisan key:generate

## Creating a Personal Access Client to Login
### Path for login: "/api/auth/login" POST
php artisan passport:client --personal

## Then copy access client id and access client secret from terminal set to env file
#### PASSPORT_PERSONAL_ACCESS_CLIENT_ID="client-id-value"
#### PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET="unhashed-client-secret-value"

## After login you will have token to access api resource
### List path for api resource:
#### Store Manage
+ "/api/auth/stores/list"         GET
+ "/api/auth/stores/detail/{id}"  GET     params( id )
+ "/api/auth/stores/search"       POST    params( keyWord )
+ "/api/auth/stores/create"       POST    params( store_id, name, description, price )
+ "/api/auth/stores/update/{id}"  PUT     params( id )
+ "/api/auth/stores/delete/{id}"  DELETE  params( id )

#### Product Manage
+ "/api/auth/products/list"         GET     
+ "/api/auth/products/detail/{id}"  GET     params( id )
+ "/api/auth/products/search"       POST    params( keyWord )
+ "/api/auth/products/create"       POST    params( store_id, name, description, price )
+ "/api/auth/products/update/{id}"  PUT     params( id, store_id, name, description, price )
+ "/api/auth/products/delete/{id}"  DELETE  params( id )

## Thanks for reading
