const URL = 'https://demo.antcloud-miniprogram.com';
const TEMPLATE_ID = 'ZThjM2Y3MWZkZDU3OWY5Y2FmYzAwZWYzN2RlZTU1Y2Q=';

const EIGHT_HOURS = 8 * 3600 * 1000;
/**
 * 格式化时间：YYYY-mm-dd hh:mm:ss
 * @param {number} dt timestamp
 */
function formatDateTime(dt = Date.now()) {
  const [date, time] = new Date(dt + EIGHT_HOURS).toISOString().split('T'); // GMT+8
  return `${date} ${time.match(/^\d{2}:\d{2}:\d{2}/)}`;
}

Page({
  data: {
    userInfo: null
  },
  async handleSendMessage(event) {
    const isDelay = Boolean(event.buttonTarget.dataset.delay);
    const formId = event.detail.formId; // 获取 formId
    try {
      my.showLoading();
      const user = await this.getUserInfo();
      await this.sendTemplateMessage({
        to_user_id: user.userId,
        form_id: formId,
        isdelay: isDelay
      });
      this.toast('已发送成功至支付宝消息提醒');
    } catch (e) {
      this.toast(e.message || '消息推送失败');
    } finally {
      my.hideLoading();
    }
  },
  /**
   * 调用服务端接口推送模版消息
   * 接口参数和服务端约定
   * @param {any} options 
   */
  async sendTemplateMessage(options) {
    const defaults = {
      user_template_id: TEMPLATE_ID,
      page: 'pages/index/index',
      data: JSON.stringify({
        keyword1: { value: '测试模版消息推送完成' },
        keyword2: { value: formatDateTime() }
      }),
      isdelay: false
    };
    const res = await my.request({
      url: `${URL}/alipay/message/minitemplatemessage`,
      data: {
        ...defaults,
        ...options,
      }
    });
    const { data } = res;
    if (!data.success) {
      throw new Error(data.subMsg || '消息推送失败');
    }
    return data;
  },
  /**
   * 调用服务端接口获取用户信息
   */
  async getUserInfo() {
    if (this.data.userInfo) {
      return this.data.userInfo;
    }

    const { authCode } = await this.getAuthCode();
    const res = await my.request({
      url: `${URL}/alipay/message/alipayUserInfo`,
      data: { authCode }
    });
    const { data } = res;
    if (!data.success) {
      throw new Error('用户登陆失败');
    }
    this.data.userInfo = data;
    return data;
  },
  getAuthCode() {
    return new Promise((resolve, reject) => {
      my.getAuthCode({
        scopes: 'auth_user',
        success: resolve,
        fail: reject
      });
    });
  },
  toast(message) {
    my.showToast({
      content: message,
      duration: 3000
    });
  }
});
