/**
 * @api / Status Code
 * @apiVersion 1.0.0
 * @apiName StatusCode
 * @apiGroup Status Code
 *
 * @apiError 400 Bad request
 * @apiError 401 Authorization/Auth token is invalid
 * @apiError 403 No access rights to access
 * @apiError 404 Resource is not found
 * @apiError 412 Validation Error
 * @apiError 500 Server Error
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 401 Error Authorization & Authentication Request
 {
    "success": false,
    "message": "Customer is unauthorized. The Token is invalid."
 }

 HTTP/1.1 403 Forbidden
 {
    "success": false,
    "message": "You don't have the access rights to this module."
 }

 HTTP/1.1 404 Not Found
 {
    "success": false,
    "message": "The customer is not found."
 }

 HTTP/1.1 412 Error Validation Request
 {
    "success": false,
    "message": {
        "first_name": [
            "The first name field is required."
        ],
    }
 }

 HTTP/1.1 500 Error In Server Request
 {
    "success": false,
    "message": "Server Error"
 }
 */

/**
 * @api {post} /api/register 1. Register
 * @apiVersion 1.0.0
 * @apiName Register
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} first_name            First name
 * @apiParam {String} last_name             Last name
 * @apiParam {String} email                 email
 * @apiParam {String} password              password
 *
 * @apiExample {curl} Example usage:
 {
    "email": "chhounsophanon6@gmail.com",
    "password": "password",
    "last_name": "Chhoun",
    "first_name": "Sophanon"
 }
 *
 * @apiUse DefaultResponse
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "access_token": "12fbc3250eff41a730de108256275a098d3e20423ecd3d49b33e34c16e1db85a",
        "expired_at": 1609076704,
        "customer": {
            "id": 5,
            "first_name": "Sophanon",
            "last_name": "Chhoun",
            "dob": "2020-12-12",
            "gender": "m",
            "identification_id": null,
            "street_address": null,
            "city": null,
            "country": null,
            "zip": null,
            "phone_number": null,
            "is_enable": 1,
            "created_at": "2020-12-26T13:45:04.000000Z",
            "updated_at": "2020-12-26T13:45:04.000000Z",
            "email": "borey@gmail.com",
            "identification_type_id": null
        }
    }
}
 *
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/login 2. Login
 * @apiVersion 1.0.0
 * @apiName Login
 * @apiGroup Authentication
 *
 * @apiUse PostHeaderWithoutAuth
 *
 * @apiParam {String} email         Customer email
 * @apiParam {String} password      Customer password
 *
 * @apiExample {curl} Example usage:
 {
    "email": "chhounsophanon14@gmail.com"
	"password": "password"
 }
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.access_token       auth token to authorize access private api for each customer
 * @apiSuccess (200) {timestamp}    data.expired_at         auth token expiration time
 * @apiSuccess (200) {object}       data.customer               customer profile
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "access_token": "12fbc3250eff41a730de108256275a098d3e20423ecd3d49b33e34c16e1db85a",
        "expired_at": 1609076704,
        "customer": {
            "id": 5,
            "first_name": "Sophanon",
            "last_name": "Chhoun",
            "dob": "2020-12-12",
            "gender": "m",
            "identification_id": null,
            "street_address": null,
            "city": null,
            "country": null,
            "zip": null,
            "phone_number": null,
            "is_enable": 1,
            "created_at": "2020-12-26T13:45:04.000000Z",
            "updated_at": "2020-12-26T13:45:04.000000Z",
            "email": "borey@gmail.com",
            "identification_type_id": null
        }
    }
}
 *
 * @apiUse IncorrectUsernamePassword
 * @apiUse AuthorizationInvalid
 * @apiUse ErrorValidation
 * @apiUse ServerServerError
 */

/**
 * @api {post} /api/logout 3. Log Out
 * @apiVersion 1.0.0
 * @apiName Logout
 * @apiGroup Authentication
 *
 * @apiUse PostHeader
 *
 * @apiUse DefaultResponse
 * @apiSuccess (200) {String}       data.message            message of success
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "message": "You have logged out successfully."
    }
 }
 *
 * @apiUse AuthorizationInvalid
 * @apiUse ServerServerError
 */
