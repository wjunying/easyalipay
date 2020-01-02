授权（Oauth）
换取授权访问令牌(Oauth->getToken)
getToken(String $grant_type,String $code,String $refresh_token);
对应openapi接口：alipay.system.oauth.token （换取授权访问令牌接口）

照片（Image）
上传照片(Image->upload)
upload(String $image_name,String $image_content);
对应openapi接口：alipay.offline.material.image.upload （上传门店照片和视频接口）
实现方法中固定设置image_type=jpg

视频（Video）
上传视频(Video->upload)
upload(String $image_name,String $image_content);
对应openapi接口：alipay.offline.material.image.upload （上传门店照片和视频接口）
实现方法中固定设置image_type=mp4

