/**
 * @api {get} /api/hotel/list 1. List hotel
 * @apiVersion 1.0.0
 * @apiName List hotel
 * @apiGroup Hotel
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        {
            "id": 1,
            "title": "Siem Reap hotel",
            "city": "Siem Reap",
            "country": "Cambodia",
            "description": "<p>Hello World</p>",
            "imageSrc": "http://127.0.0.1:8000/uploads/images/5df240b2530816bd2bfae92d7942609c.png",
            "imageAlt": "image"
        },
        {
            "id": 2,
            "title": "Phnom Penh Hotel",
            "city": "Phnom Penh",
            "country": "Cambodia",
            "description": "<p>Hello WOrld</p>",
            "imageSrc": "http://127.0.0.1:8000/uploads/images/64b645427336007bea5d870b3746c14a.png",
            "imageAlt": "image"
        },
        {
            "id": 3,
            "title": "Borey Angkor",
            "city": "Siem Reap",
            "country": "Cambodia",
            "description": "",
            "imageSrc": "http://127.0.0.1:8000/uploads/images/4904b34a695e2202d51d88c1c41a8b92.png",
            "imageAlt": "image"
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/hotel/show/:id 2. Show hotel
 * @apiVersion 1.0.0
 * @apiName show hotel
 * @apiGroup Hotel
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 1,
        "title": "Siem Reap hotel",
        "street_address": "193",
        "city": "Siem Reap",
        "country": "Cambodia",
        "description": "<p>Hello World</p>",
        "medias": [
            {
                "imageSrc": "http://127.0.0.1:8000/uploads/images/5df240b2530816bd2bfae92d7942609c.png",
                "imageAlt": "image"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
