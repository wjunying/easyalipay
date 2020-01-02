const baseUrl = 'http://127.0.0.1:8080';
// const baseUrl = 'https://demo.antcloud-miniprogram.com';
const verifyErrMsg = {
  '1000':	'采集成功',
  '2006':	'采集失败',
  '1001':	'系统错误',
  '1003':	'采集中断',
  '1004':	'参数错误'
}

  export function startVerify() {
    return new Promise((resolve, reject) => {
      const bizId = (new Date().getTime()).toString();
      const self = this;
      my.showLoading();
      my.ap.faceVerify({
        bizId,
        bizType: '2',
        success: (res) => {
          if (res.faceRetCode === '1000') { // 采集成功
            my.request({
              url: `${baseUrl}/alipay/faceverify/zolozIdentification`,
              method: 'GET',
              data: {
                biz_id: bizId,
                zim_id: res.zimId
              },
              dataType: 'json',
              success: function(res) {
                resolve({ res });
              },
              fail: function(res) {
                my.alert({content: 'fail'});
                reject({
                  res
                });
              },
              complete: function(res) {
                my.hideLoading();
              }
            });
          } else {
            my.hideLoading();
            my.alert({
              content: `${res.faceRetCode}: ${verifyErrMsg[res.faceRetCode]}`,
            });
          }
        },
        fail: (res) => {
          my.alert({
            content: JSON.stringify(res),
          });
        }
      });
    });
  }