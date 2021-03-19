define({ "api": [
  {
    "type": "post",
    "url": "/api/login",
    "title": "2. Login",
    "version": "1.0.0",
    "name": "Login",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Customer email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Customer password</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": " {\n    \"email\": \"chhounsophanon14@gmail.com\"\n\t\"password\": \"password\"\n }",
        "type": "curl"
      }
    ],
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "String",
            "optional": false,
            "field": "data.access_token",
            "description": "<p>auth token to authorize access private api for each customer</p>"
          },
          {
            "group": "200",
            "type": "timestamp",
            "optional": false,
            "field": "data.expired_at",
            "description": "<p>auth token expiration time</p>"
          },
          {
            "group": "200",
            "type": "object",
            "optional": false,
            "field": "data.customer",
            "description": "<p>customer profile</p>"
          },
          {
            "group": "200",
            "type": "boolean",
            "optional": false,
            "field": "success",
            "description": "<p>success status</p>"
          },
          {
            "group": "200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>response data</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n{\n    \"success\": true,\n    \"data\": {\n        \"access_token\": \"12fbc3250eff41a730de108256275a098d3e20423ecd3d49b33e34c16e1db85a\",\n        \"expired_at\": 1609076704,\n        \"customer\": {\n            \"id\": 5,\n            \"first_name\": \"Sophanon\",\n            \"last_name\": \"Chhoun\",\n            \"dob\": \"2020-12-12\",\n            \"gender\": \"m\",\n            \"identification_id\": null,\n            \"street_address\": null,\n            \"city\": null,\n            \"country\": null,\n            \"zip\": null,\n            \"phone_number\": null,\n            \"is_enable\": 1,\n            \"created_at\": \"2020-12-26T13:45:04.000000Z\",\n            \"updated_at\": \"2020-12-26T13:45:04.000000Z\",\n            \"email\": \"borey@gmail.com\",\n            \"identification_type_id\": null\n        }\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./Authentication.js",
    "groupTitle": "Authentication",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/login"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "400",
            "optional": false,
            "field": "IncorrectUsernamePassword",
            "description": "<p>Username or Password is incorrect.</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthorizationInvalid",
            "description": "<p>authorization token is missing, expire, or invalid.</p>"
          },
          {
            "group": "4xx",
            "type": "412",
            "optional": false,
            "field": "ErrorValidation",
            "description": "<p>validation of required, format, min, max, ....</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "400 (IncorrectUsernamePassword):",
          "content": "HTTP/1.1 400 Bad Request\n{\n   \"success\": false,\n   \"message\": \"The username/password is incorrect.\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthorizationInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"The authorization is invalid.\"\n}",
          "type": "json"
        },
        {
          "title": "412 (ErrorValidation):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": {\n       \"field\": [\n           \"validation message\"\n       ]\n   }\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/logout",
    "title": "3. Log Out",
    "version": "1.0.0",
    "name": "Logout",
    "group": "Authentication",
    "success": {
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "String",
            "optional": false,
            "field": "data.message",
            "description": "<p>message of success</p>"
          },
          {
            "group": "200",
            "type": "boolean",
            "optional": false,
            "field": "success",
            "description": "<p>success status</p>"
          },
          {
            "group": "200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>response data</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 200 Success Request\n{\n   \"success\": true,\n   \"data\": {\n       \"message\": \"You have logged out successfully.\"\n   }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./Authentication.js",
    "groupTitle": "Authentication",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/logout"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthorizationInvalid",
            "description": "<p>authorization token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "401 (AuthorizationInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"The authorization is invalid.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/register",
    "title": "1. Register",
    "version": "1.0.0",
    "name": "Register",
    "group": "Authentication",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "first_name",
            "description": "<p>First name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "last_name",
            "description": "<p>Last name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>password</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": "{\n   \"email\": \"chhounsophanon6@gmail.com\",\n   \"password\": \"password\",\n   \"last_name\": \"Chhoun\",\n   \"first_name\": \"Sophanon\"\n}",
        "type": "curl"
      }
    ],
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"access_token\": \"12fbc3250eff41a730de108256275a098d3e20423ecd3d49b33e34c16e1db85a\",\n        \"expired_at\": 1609076704,\n        \"customer\": {\n            \"id\": 5,\n            \"first_name\": \"Sophanon\",\n            \"last_name\": \"Chhoun\",\n            \"dob\": \"2020-12-12\",\n            \"gender\": \"m\",\n            \"identification_id\": null,\n            \"street_address\": null,\n            \"city\": null,\n            \"country\": null,\n            \"zip\": null,\n            \"phone_number\": null,\n            \"is_enable\": 1,\n            \"created_at\": \"2020-12-26T13:45:04.000000Z\",\n            \"updated_at\": \"2020-12-26T13:45:04.000000Z\",\n            \"email\": \"borey@gmail.com\",\n            \"identification_type_id\": null\n        }\n    }\n}",
          "type": "json"
        }
      ],
      "fields": {
        "200": [
          {
            "group": "200",
            "type": "boolean",
            "optional": false,
            "field": "success",
            "description": "<p>success status</p>"
          },
          {
            "group": "200",
            "type": "object",
            "optional": false,
            "field": "data",
            "description": "<p>response data</p>"
          }
        ]
      }
    },
    "filename": "./Authentication.js",
    "groupTitle": "Authentication",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/register"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthorizationInvalid",
            "description": "<p>authorization token is missing, expire, or invalid.</p>"
          },
          {
            "group": "4xx",
            "type": "412",
            "optional": false,
            "field": "ErrorValidation",
            "description": "<p>validation of required, format, min, max, ....</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "401 (AuthorizationInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"The authorization is invalid.\"\n}",
          "type": "json"
        },
        {
          "title": "412 (ErrorValidation):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": {\n       \"field\": [\n           \"validation message\"\n       ]\n   }\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/booking/stay",
    "title": "2. Book a stay",
    "version": "1.0.0",
    "name": "Book_a_stay",
    "group": "Booking",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"hotels\": [\n            {\n                \"id\": 1,\n                \"name\": \"Siem Reap hotel\"\n            },\n            {\n                \"id\": 2,\n                \"name\": \"Phnom Penh Hotel\"\n            },\n            {\n                \"id\": 3,\n                \"name\": \"Borey Angkor\"\n            },\n            {\n                \"id\": 4,\n                \"name\": \"Borey Angkor\"\n            }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./booking.js",
    "groupTitle": "Booking",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/booking/stay"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/booking-offers",
    "title": "3. Booking Offer",
    "version": "1.0.0",
    "name": "Booking_Offer",
    "group": "Booking",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "hotel_id",
            "description": "<p>Hotel Id</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "checkInDate",
            "description": "<p>Check in</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "checkOutDate",
            "description": "<p>Check out</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "people",
            "description": "<p>People</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": " {\n    \"checkOutDate\": \"2020-12-28\",\n    \"checkInDate\": \"2020-12-25\",\n    \"hotel_id\": 2,\n    \"people\": 2\n}",
        "type": "curl"
      }
    ],
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"hotel_id\": 2,\n        \"roomTypes\": [\n            {\n                \"id\": 3,\n                \"name\": \"Suite Sojourn\",\n                \"description\": \"Wherever you find yourself this festive season, Rosewood seeks to inspire your most memorable moments.\",\n                \"price\": 207,\n                \"max\": 2,\n                \"qtyAvailable\": 2\n            },\n            {\n                \"id\": 4,\n                \"name\": \"Borey Angkor\",\n                \"description\": \"<p>Testing</p>\",\n                \"price\": 200,\n                \"max\": 3,\n                \"qtyAvailable\": 1\n            }\n        ],\n        \"paymentType\": [\n            {\n                \"id\": 1,\n                \"name\": \"Visa\"\n            },\n            {\n                \"id\": 2,\n                \"name\": \"Mastercard\"\n            },\n            {\n                \"id\": 3,\n                \"name\": \"Cash\"\n            }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./booking.js",
    "groupTitle": "Booking",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/booking-offers"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/booking/store",
    "title": "4. Booking Store",
    "version": "1.0.0",
    "name": "Booking_Store",
    "group": "Booking",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "hotel_id",
            "description": "<p>Hotel Id</p>"
          },
          {
            "group": "Parameter",
            "type": "integer",
            "optional": false,
            "field": "payment_type_id",
            "description": "<p>Payment Type Id</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "check_in_date",
            "description": "<p>Check In</p>"
          },
          {
            "group": "Parameter",
            "type": "date",
            "optional": false,
            "field": "check_out_date",
            "description": "<p>Check Out</p>"
          },
          {
            "group": "Parameter",
            "type": "array",
            "optional": false,
            "field": "rooms",
            "description": "<p>Room IDs</p>"
          },
          {
            "group": "Parameter",
            "type": "array",
            "optional": false,
            "field": "room_types_id",
            "description": "<p>Room Type IDs</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": "{\n   \"roomTypes\" : [\n       {\n           \"id\" :2,\n           \"quantity\": 1\n       }\n   ],\n   \"hotel_id\": 1,\n   \"check_in_date\": \"2020-12-07\",\n   \"check_out_date\": \"2021-01-03\",\n   \"payment_type_id\": 1\n}",
        "type": "curl"
      }
    ],
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n{\n    \"success\": true,\n    \"data\": {\n        \"total\": 407,\n        \"booking\": {\n            \"check_in_date\": \"2021-02-01\",\n            \"check_out_date\": \"2021-02-02\",\n            \"booking_type\": \"online\",\n            \"payment_type\": \"Visa\",\n            \"hotel\": \"The Grand Overlook\",\n            \"customer_first_name\": \"Sophanon\",\n            \"customer_last_name\": \"Chhoun\"\n        }\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./booking.js",
    "groupTitle": "Booking",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/booking/store"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/bookings",
    "title": "1. List Booking",
    "version": "1.0.0",
    "name": "List_Booking",
    "group": "Booking",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n   \"success\": true,\n   \"data\": [\n        {\n            \"id\": 74,\n            \"total\": 407,\n            \"check_in_date\": \"2021-01-30\",\n            \"check_out_date\": \"2021-01-31\",\n            \"booking_type_name\": \"online\",\n            \"customer_first_name\": \"Sophanon\",\n            \"customer_last_name\": \"Chhoun\",\n            \"hotel\": {\n                \"id\": 2,\n                \"name\": \"The Grand Overlook\",\n                \"street_address\": \"1889 Angkor Boulevard\",\n                \"city\": \"Siem Reap\",\n                \"country\": \"Cambodia\",\n                \"media\": []\n            },\n            \"roomTypes\": [\n                {\n                    \"id\": 4,\n                    \"name\": \"Borey Angkor\",\n                    \"price_per_room\": 200,\n                    \"quantity\": 1,\n                    \"total\": 200,\n                    \"maximum\": 3,\n                    \"rooms\": [\n                        {\n                            \"name\": \"Room 5\"\n                        }\n                    ]\n                },\n                {\n                    \"id\": 3,\n                    \"name\": \"Suite Sojourn\",\n                    \"price_per_room\": 207,\n                    \"quantity\": 1,\n                    \"total\": 207,\n                    \"maximum\": 2,\n                    \"rooms\": [\n                        {\n                            \"name\": \"Room 1\"\n                        }\n                    ]\n                }\n            ]\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./booking.js",
    "groupTitle": "Booking",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/bookings"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthInvalid",
            "description": "<p>auth token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"user is unauthorized. The token is invalid.\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/hotel/list",
    "title": "1. List hotel",
    "version": "1.0.0",
    "name": "List_hotel",
    "group": "Hotel",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n{\n    \"success\": true,\n    \"data\": [\n        {\n            \"id\": 1,\n            \"title\": \"Siem Reap hotel\",\n            \"city\": \"Siem Reap\",\n            \"country\": \"Cambodia\",\n            \"description\": \"<p>Hello World</p>\",\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/5df240b2530816bd2bfae92d7942609c.png\",\n            \"imageAlt\": \"image\"\n        },\n        {\n            \"id\": 2,\n            \"title\": \"Phnom Penh Hotel\",\n            \"city\": \"Phnom Penh\",\n            \"country\": \"Cambodia\",\n            \"description\": \"<p>Hello WOrld</p>\",\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/64b645427336007bea5d870b3746c14a.png\",\n            \"imageAlt\": \"image\"\n        },\n        {\n            \"id\": 3,\n            \"title\": \"Borey Angkor\",\n            \"city\": \"Siem Reap\",\n            \"country\": \"Cambodia\",\n            \"description\": \"\",\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/4904b34a695e2202d51d88c1c41a8b92.png\",\n            \"imageAlt\": \"image\"\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./hotel.js",
    "groupTitle": "Hotel",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/hotel/list"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/hotel/show/:id",
    "title": "2. Show hotel",
    "version": "1.0.0",
    "name": "show_hotel",
    "group": "Hotel",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"id\": 1,\n        \"title\": \"Siem Reap hotel\",\n        \"street_address\": \"193\",\n        \"city\": \"Siem Reap\",\n        \"country\": \"Cambodia\",\n        \"description\": \"<p>Hello World</p>\",\n        \"medias\": [\n            {\n                \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/5df240b2530816bd2bfae92d7942609c.png\",\n                \"imageAlt\": \"image\"\n            }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./hotel.js",
    "groupTitle": "Hotel",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/hotel/show/:id"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/about_us",
    "title": "1. About Us",
    "version": "1.0.0",
    "name": "About_Us",
    "group": "Page",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"id\": 1,\n        \"description\": \"<h1>Hello WOrld</h1>\\n\\n<p>There is no world</p>\",\n        \"created_at\": null,\n        \"updated_at\": \"2020-12-11T09:02:14.000000Z\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./about_us.js",
    "groupTitle": "Page",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/about_us"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/contact_us",
    "title": "2. Contact Us",
    "version": "1.0.0",
    "name": "Contact_Us",
    "group": "Page",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n{\n    \"success\": true,\n    \"data\": [\n        {\n            \"title\": \"Phnom Penh Hotel\",\n            \"address\": \"Phnom Penh\",\n            \"phone_number\": \"+855 23 919 192\",\n            \"fax\": \"+855 24 220 663\",\n            \"email\": \"phnompenh@hotel.com\"\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./about_us.js",
    "groupTitle": "Page",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/contact_us"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/profile",
    "title": "1. Show Customer Profile",
    "version": "1.0.0",
    "name": "Show_Profile",
    "group": "Profile",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"first_name\": \"Sophanon\",\n        \"last_name\": \"Chhoun\",\n        \"dob\": \"2001-09-11\",\n        \"gender\": \"m\",\n        \"identification_id\": 122232122,\n        \"street_address\": \"Siem Reap\",\n        \"city\": \"Siem Reap\",\n        \"country\": \"Cambodia\",\n        \"zip\": \"855\",\n        \"phone_number\": \"061794013\",\n        \"email\": \"chhounsophanon@gmail.com\",\n        \"identification_type_id\": 1,\n        \"image\": \"http://127.0.0.1:8000/uploads/images/ddfd1eba099e432b5ada861748aa437d.png\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./customer.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/profile"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthInvalid",
            "description": "<p>auth token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"user is unauthorized. The token is invalid.\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/profile/update/avatar",
    "title": "4. Update Customer Avatar",
    "version": "1.0.0",
    "name": "Update_Avatar",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Text",
            "optional": false,
            "field": "image",
            "description": "<p>Base64 Image</p>"
          }
        ]
      }
    },
    "examples": [
      {
        "title": "Example usage:",
        "content": " {\n\t\"image\" : \"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k=\"\n }",
        "type": "curl"
      }
    ],
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": \"Profile update successfully\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./customer.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/profile/update/avatar"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthInvalid",
            "description": "<p>auth token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"user is unauthorized. The token is invalid.\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/profile/update/password",
    "title": "3. Update Customer Password",
    "version": "1.0.0",
    "name": "Update_Password",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "old_password",
            "description": "<p>Customer current password</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "new_password",
            "description": "<p>Customer new password</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": \"Customer password update successfully\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./customer.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/profile/update/password"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthInvalid",
            "description": "<p>auth token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"user is unauthorized. The token is invalid.\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "post",
    "url": "/api/profile/update",
    "title": "2. Update Customer Profile",
    "version": "1.0.0",
    "name": "Update_Profile",
    "group": "Profile",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "email",
            "description": "<p>Customer Email</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "first_name",
            "description": "<p>First Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "last_name",
            "description": "<p>Last Name</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "street_address",
            "description": "<p>Street Address</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "string",
            "optional": false,
            "field": "phone_number",
            "description": "<p>Phone Number</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": \"Customer update success\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./customer.js",
    "groupTitle": "Profile",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/profile/update"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Auth",
            "description": "<p>Access token from user login.</p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Content-Type",
            "description": "<p><code>application/x-www-form-urlencoded</code></p>"
          },
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          },
          {
            "group": "4xx",
            "type": "401",
            "optional": false,
            "field": "AuthInvalid",
            "description": "<p>auth token is missing, expire, or invalid.</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        },
        {
          "title": "401 (AuthInvalid):",
          "content": "HTTP/1.1 401 Unauthorized\n{\n   \"success\": false,\n   \"message\": \"user is unauthorized. The token is invalid.\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/roomType/list",
    "title": "1. List Room Type",
    "version": "1.0.0",
    "name": "List_room_type",
    "group": "Room_Type",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n{\n    \"success\": true,\n    \"data\": [\n        {\n            \"id\": 13,\n            \"title\": \"Hello\",\n            \"price\": 222,\n            \"description\": \"<p>sssxs</p>\",\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/87723d9333ee51f22284240da5191904.png\",\n            \"imageAlt\": \"image\"\n        },\n        {\n            \"id\": 14,\n            \"title\": \"King\",\n            \"price\": 300,\n            \"description\": \"<p>King Room</p>\",\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/1124995e13a578917814141c05b7f441.png\",\n            \"imageAlt\": \"image\"\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./roomType.js",
    "groupTitle": "Room_Type",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/roomType/list"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/roomType/show/:id",
    "title": "2. Show room type",
    "version": "1.0.0",
    "name": "show_room_type",
    "group": "Room_Type",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n    \"success\": true,\n    \"data\": {\n        \"id\": 14,\n        \"title\": \"King\",\n        \"description\": \"<p>King Room</p>\",\n        \"price\": 300,\n        \"medias\": [\n            {\n                \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/1124995e13a578917814141c05b7f441.png\",\n                \"imageAlt\": \"image\"\n            }\n        ]\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./roomType.js",
    "groupTitle": "Room_Type",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/roomType/show/:id"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "get",
    "url": "/api/spotlights",
    "title": "1. List Spotlights",
    "version": "1.0.0",
    "name": "List_Spotlights",
    "group": "Spotlights",
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": " HTTP/1.1 200 Success Request\n {\n     \"success\": true,\n    \"data\": [\n        {\n            \"id\": 2,\n            \"imageSrc\": \"http://127.0.0.1:8000/uploads/images/dcb14976fbc47bd4f6ed980d3c0a5899.png\",\n            \"imageAlt\": \"image\",\n            \"caption\": \"Hello\",\n            \"title\": \"Hello\",\n            \"description\": \"Hello\",\n            \"hotelId\": 1\n        }\n    ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./spotlights.js",
    "groupTitle": "Spotlights",
    "sampleRequest": [
      {
        "url": "http://127.0.0.1:8000//api/spotlights"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "string",
            "optional": false,
            "field": "Accept",
            "description": "<p><code>application/json</code></p>"
          }
        ]
      }
    },
    "error": {
      "fields": {
        "4xx": [
          {
            "group": "4xx",
            "type": "404",
            "optional": false,
            "field": "NotFound",
            "description": "<p>resource is not found</p>"
          }
        ],
        "5xx": [
          {
            "group": "5xx",
            "type": "500",
            "optional": false,
            "field": "InternalSeverError",
            "description": "<p>internal server error</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "404 (NotFound):",
          "content": "HTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The :attribute is not found.\"\n}",
          "type": "json"
        },
        {
          "title": "500 (InternalSeverError):",
          "content": "HTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "",
    "url": "/",
    "title": "Status Code",
    "version": "1.0.0",
    "name": "StatusCode",
    "group": "Status_Code",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "400",
            "description": "<p>Bad request</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "401",
            "description": "<p>Authorization/Auth token is invalid</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "403",
            "description": "<p>No access rights to access</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "404",
            "description": "<p>Resource is not found</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "412",
            "description": "<p>Validation Error</p>"
          },
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "500",
            "description": "<p>Server Error</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Response (example):",
          "content": "HTTP/1.1 401 Error Authorization & Authentication Request\n{\n   \"success\": false,\n   \"message\": \"Customer is unauthorized. The Token is invalid.\"\n}\n\nHTTP/1.1 403 Forbidden\n{\n   \"success\": false,\n   \"message\": \"You don't have the access rights to this module.\"\n}\n\nHTTP/1.1 404 Not Found\n{\n   \"success\": false,\n   \"message\": \"The customer is not found.\"\n}\n\nHTTP/1.1 412 Error Validation Request\n{\n   \"success\": false,\n   \"message\": {\n       \"first_name\": [\n           \"The first name field is required.\"\n       ],\n   }\n}\n\nHTTP/1.1 500 Error In Server Request\n{\n   \"success\": false,\n   \"message\": \"Server Error\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "./Authentication.js",
    "groupTitle": "Status_Code",
    "sampleRequest": [
      {
        "url": "/"
      }
    ]
  }
] });
