/**
 * @api {get} /api/spotlights 1. List Spotlights
 * @apiVersion 1.0.0
 * @apiName List Spotlights
 * @apiGroup Spotlights
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
     "success": true,
    "data": [
        {
            "id": 2,
            "imageSrc": "http://127.0.0.1:8000/uploads/images/dcb14976fbc47bd4f6ed980d3c0a5899.png",
            "imageAlt": "image",
            "caption": "Hello",
            "title": "Hello",
            "description": "Hello",
            "hotelId": 1
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
