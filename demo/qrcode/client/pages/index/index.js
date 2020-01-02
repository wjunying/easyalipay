const URL = 'https://demo.antcloud-miniprogram.com';

Page({
  data: {
    nickname: '小程序二维码示例',
    qrCode: ''
  },
  async onShow() {
    try {
      const qrcode = await this.getQRCode({
        url: 'page/index/index',
        query: 'qrcode',
        describe: '二维码测试'
      });
      this.setData({
        qrCode: qrcode
      });
    } catch (error) {
      console.error(error);
    }
  },
  getQRCode({ url, query, describe }) {
    return new Promise((resolve, reject) => {
      my.httpRequest({
        url: `${URL}/alipay/qrcode/alipayOpenAppQrcodeCreate`,
        data: {
          url_param: url,
          query_param: query,
          describe: describe
        },
        success: (res) => {
          if (!res.data.success) {
            reject({
              message: '二维码生成失败',
              res
            });
          }
          resolve(res.data.qrCodeUrl);
        },
        fail: (error) => {
          reject({
            message: '二维码生成异常',
            error
          });
        }
      });
    });
  },
  async onSaveQRCodeHandler() {
    if (this.data.qrCode !== '') {
      my.saveImage({
        url: this.data.qrCode,
        success: (res) => {
          my.showToast({
            type: 'success',
            content: '二维码保存成功',
            duration: 3000
          });
        },
        fail: (err) => {
          my.showToast({
            type: 'fail',
            content: `保存失败，${err.errorMessage}`,
            duration: 3000
          });
        }
      });
    } else {
      my.showToast({
        type: 'fail',
        content: '二维码加载中，请稍后',
        duration: 3000
      });
    }
  }
});
