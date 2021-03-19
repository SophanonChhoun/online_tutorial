/**
 * @api {get} /api/bookings 1. List Booking
 * @apiVersion 1.0.0
 * @apiName List Booking
 * @apiGroup Booking
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
   "success": true,
   "data": [
        {
            "id": 74,
            "total": 407,
            "check_in_date": "2021-01-30",
            "check_out_date": "2021-01-31",
            "booking_type_name": "online",
            "customer_first_name": "Sophanon",
            "customer_last_name": "Chhoun",
            "hotel": {
                "id": 2,
                "name": "The Grand Overlook",
                "street_address": "1889 Angkor Boulevard",
                "city": "Siem Reap",
                "country": "Cambodia",
                "media": []
            },
            "roomTypes": [
                {
                    "id": 4,
                    "name": "Borey Angkor",
                    "price_per_room": 200,
                    "quantity": 1,
                    "total": 200,
                    "maximum": 3,
                    "rooms": [
                        {
                            "name": "Room 5"
                        }
                    ]
                },
                {
                    "id": 3,
                    "name": "Suite Sojourn",
                    "price_per_room": 207,
                    "quantity": 1,
                    "total": 207,
                    "maximum": 2,
                    "rooms": [
                        {
                            "name": "Room 1"
                        }
                    ]
                }
            ]
        }
    ]
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */

/**
 * @api {get} /api/booking/stay 2. Book a stay
 * @apiVersion 1.0.0
 * @apiName Book a stay
 * @apiGroup Booking
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "hotels": [
            {
                "id": 1,
                "name": "Siem Reap hotel"
            },
            {
                "id": 2,
                "name": "Phnom Penh Hotel"
            },
            {
                "id": 3,
                "name": "Borey Angkor"
            },
            {
                "id": 4,
                "name": "Borey Angkor"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */

/**
 * @api {get} /api/booking-offers 3. Booking Offer
 * @apiVersion 1.0.0
 * @apiName Booking Offer
 * @apiGroup Booking
 *
 * @apiUse GetHeaderWithoutAuth
 *
 * @apiParam {integer} hotel_id         Hotel Id
 * @apiParam {date} checkInDate         Check in
 * @apiParam {date} checkOutDate        Check out
 * @apiParam {integer} people           People
 *
 * @apiExample {curl} Example usage:
 {
    "checkOutDate": "2020-12-28",
    "checkInDate": "2020-12-25",
    "hotel_id": 2,
    "people": 2
}
 * @apiSuccessExample  Response (example):
 *  HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "hotel_id": 2,
        "roomTypes": [
            {
                "id": 3,
                "name": "Suite Sojourn",
                "description": "Wherever you find yourself this festive season, Rosewood seeks to inspire your most memorable moments.",
                "price": 207,
                "max": 2,
                "qtyAvailable": 2
            },
            {
                "id": 4,
                "name": "Borey Angkor",
                "description": "<p>Testing</p>",
                "price": 200,
                "max": 3,
                "qtyAvailable": 1
            }
        ],
        "paymentType": [
            {
                "id": 1,
                "name": "Visa"
            },
            {
                "id": 2,
                "name": "Mastercard"
            },
            {
                "id": 3,
                "name": "Cash"
            }
        ]
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */


/**
 * @api {get} /api/booking/store 4. Booking Store
 * @apiVersion 1.0.0
 * @apiName Booking Store
 * @apiGroup Booking
 *
 * @apiUse PostHeader
 *
 * @apiParam {integer} hotel_id         Hotel Id
 * @apiParam {integer} payment_type_id  Payment Type Id
 * @apiParam {date} check_in_date    Check In
 * @apiParam {date} check_out_date   Check Out
 * @apiParam {array} rooms            Room IDs
 * @apiParam {array} room_types_id            Room Type IDs
 *
 * @apiExample {curl} Example usage:
 {
    "roomTypes" : [
        {
            "id" :2,
            "quantity": 1
        }
    ],
    "hotel_id": 1,
    "check_in_date": "2020-12-07",
    "check_out_date": "2021-01-03",
    "payment_type_id": 1
 }
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
{
    "success": true,
    "data": {
        "total": 407,
        "booking": {
            "check_in_date": "2021-02-01",
            "check_out_date": "2021-02-02",
            "booking_type": "online",
            "payment_type": "Visa",
            "hotel": "The Grand Overlook",
            "customer_first_name": "Sophanon",
            "customer_last_name": "Chhoun"
        }
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 */
