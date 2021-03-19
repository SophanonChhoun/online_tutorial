/**
 * @api {get} /api/about_us 1. About Us
 * @apiVersion 1.0.0
 * @apiName About Us
 * @apiGroup Page
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "description": "<h1>Hello WOrld</h1>\n\n<p>There is no world</p>",
        "created_at": null,
        "updated_at": "2020-12-11T09:02:14.000000Z"
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/contact_us 2. Contact Us
 * @apiVersion 1.0.0
 * @apiName Contact Us
 * @apiGroup Page
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        {
            "title": "Phnom Penh Hotel",
            "address": "Phnom Penh",
            "phone_number": "+855 23 919 192",
            "fax": "+855 24 220 663",
            "email": "phnompenh@hotel.com"
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
