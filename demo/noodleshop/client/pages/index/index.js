Page({
  onReady() {
    // 页面加载完成
  },
  onShow() {
    // 页面显示
  },
  onShareAppMessage() {
    // 返回自定义分享信息
    return {
      title: '面馆小程序',
      desc: '支付宝小程序Demo',
      path: 'pages/index/index',
    };
  },
  enterShopPage() {
    this.authBeforeNavigate('/pages/shop/shop');
  },
  enterCouponsPage() {
    this.authBeforeNavigate('/pages/coupons/coupons');
  },
  enterOrderPage() {
    this.authBeforeNavigate('/pages/orders/orders');
  },
  async authBeforeNavigate(url) {
    my.showLoading();

    const app = getApp();
    try {
      await app.getUserId();
      my.hideLoading();
      my.navigateTo({
        url,
      });
    } catch (error) {
      my.hideLoading();
      my.showToast({
        content: '获取用户信息失败',
      });
    }
  }
});
