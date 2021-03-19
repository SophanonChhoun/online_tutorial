/**
 * @api {get} /api/roomType/list 1. List Room Type
 * @apiVersion 1.0.0
 * @apiName List room type
 * @apiGroup Room Type
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": [
        {
            "id": 13,
            "title": "Hello",
            "price": 222,
            "description": "<p>sssxs</p>",
            "imageSrc": "http://127.0.0.1:8000/uploads/images/87723d9333ee51f22284240da5191904.png",
            "imageAlt": "image"
        },
        {
            "id": 14,
            "title": "King",
            "price": 300,
            "description": "<p>King Room</p>",
            "imageSrc": "http://127.0.0.1:8000/uploads/images/1124995e13a578917814141c05b7f441.png",
            "imageAlt": "image"
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/roomType/show/:id 2. Show room type
 * @apiVersion 1.0.0
 * @apiName show room type
 * @apiGroup Room Type
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "id": 14,
        "title": "King",
        "description": "<p>King Room</p>",
        "price": 300,
        "medias": [
            {
                "imageSrc": "http://127.0.0.1:8000/uploads/images/1124995e13a578917814141c05b7f441.png",
                "imageAlt": "image"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
