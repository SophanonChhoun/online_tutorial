/**
 * @api {get} /api/profile 1. Show Customer Profile
 * @apiVersion 1.0.0
 * @apiName Show Profile
 * @apiGroup Profile
 *
 * @apiUse GetHeader
 *
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": {
        "first_name": "Sophanon",
        "last_name": "Chhoun",
        "dob": "2001-09-11",
        "gender": "m",
        "identification_id": 122232122,
        "street_address": "Siem Reap",
        "city": "Siem Reap",
        "country": "Cambodia",
        "zip": "855",
        "phone_number": "061794013",
        "email": "chhounsophanon@gmail.com",
        "identification_type_id": 1,
        "image": "http://127.0.0.1:8000/uploads/images/ddfd1eba099e432b5ada861748aa437d.png"
    }
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */

/**
 * @api {post} /api/profile/update 2. Update Customer Profile
 * @apiVersion 1.0.0
 * @apiName Update Profile
 * @apiGroup Profile
 *
 * @apiUse PostHeader
 *
 * @apiParam {string} email             Customer Email
 * @apiParam {string} first_name        First Name
 * @apiParam {string} last_name        Last Name
 * @apiParam {string} street_address   Street Address
 * @apiParam {string} city             City
 * @apiParam {string} country          Country
 * @apiParam {string} phone_number     Phone Number
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": "Customer update success"
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */

/**
 * @api {post} /api/profile/update/password 3. Update Customer Password
 * @apiVersion 1.0.0
 * @apiName Update Password
 * @apiGroup Profile
 *
 * @apiUse PostHeader
 *
 * @apiParam {string} old_password     Customer current password
 * @apiParam {string} new_password     Customer new password
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": "Customer password update successfully"
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */

/**
 * @api {post} /api/profile/update/avatar 4. Update Customer Avatar
 * @apiVersion 1.0.0
 * @apiName Update Avatar
 * @apiGroup Profile
 *
 * @apiUse PostHeader
 *
 * @apiParam {Text} image     Base64 Image
 *
 *  @apiExample {curl} Example usage:
 {
	"image" : "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAYGBgYHBgcICAcKCwoLCg8ODAwODxYQERAREBYiFRkVFRkVIh4kHhweJB42KiYmKjY+NDI0PkxERExfWl98fKcBBgYGBgcGBwgIBwoLCgsKDw4MDA4PFhAREBEQFiIVGRUVGRUiHiQeHB4kHjYqJiYqNj40MjQ+TERETF9aX3x8p//CABEIAEAAQAMBIQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAACAwABBQQGCP/aAAgBAQAAAAD6pWsqszVdjGhQP87sc16Sqdm9uTy+jVH5vZEdFW3JiUb4GRSRUaAXVMP/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAECEAAAAAAAAAD/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/9oACAEDEAAAAAAAAAD/xAA7EAACAQMBBAUHCgcAAAAAAAABAgMABBEFEiExURATFEFxFSIjJDKRsjM0U2FiZHWSscEWIHJzdJOh/9oACAEBAAE/AKkmWPA3ljwUcTQSd97ybA5Jx99G1tsDzCx7yxJrstvg4XZ5bJIrq7lfk5OsHJ+P5qimR8g5DDip49EsnVruGWJwo5moo9jJJy7e01dfbgkNMgI7iwFdog+mj/MK7RB9NH+YUCCAQcg1LCHUMDh13q3Lx8aifbU5GHG5l5GkG1PI/cnmL+/Rpum6fcC/knsoJH7fcDbdAzbnoaBo/fp9r/qWpNG0nq3I0213A8IlrRCPIelj7uvQxK3UcndIdhv2q1Pq6faJY/WSejRz6DUfxK4+OrqRobS5mUAskTsAeG4Z34qH+IJ7OOXrLBVljDfJyZG0P6qMeuaVpRAlsnS1tyQCkm0Qg+phUTF4YmIGWQE+Jq6+bse9cN7jVqfV0GfZyv8A3o0c+g1H8SuPjq+A8nagfu0nwmrEjydp4+7R/CK11dnR9Q/xpfhNW/zeH+2n6VdD1Zs8WIUDmSaTK3MkXASHbUfr0NosCyTNFe3sfWSNIwSXZXLHJwBUlgYLO/CXF1MzwSALI+3vweFWeq9VZW0T6fqGUiRWAt34qK1HUu0adewx6ff7ckLoubd+JFQZFvCDxCD9Kc7U8adyHbbx7qljDqMHDqcq3I1DKHBVhh13MOXh4/yzSbGAN7n2VqGPYXecsxyx5noliR8EZDDgw41t3Cn0iGQc04+40Ly3A9oq32gRiu1W+D55Y9wUE0XnfckewOb8fdUcKx5O8seLHiej/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAgEBPwAD/8QAFBEBAAAAAAAAAAAAAAAAAAAAUP/aAAgBAwEBPwAD/9k="
 }
 * @apiSuccessExample  Response (example):
 HTTP/1.1 200 Success Request
 {
    "success": true,
    "data": "Profile update successfully"
}
 *
 * @apiUse NotFound
 * @apiUse ServerServerError
 * @apiUse AuthInvalid
 */
