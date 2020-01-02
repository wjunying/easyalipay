import {
  startVerify
} from './api';

Page({
  data: {
    status: 0
  },
  onLoad(query) {
    // 页面加载
    console.info(`Page onLoad with query: ${JSON.stringify(query)}`);
  },
  async onReady() {
    // 页面加载完成
    try {
    } catch(e) {
      console.error(e);
      my.alert({
        title: e.message,
      });
    } finally {
      my.hideLoading();
    }
  },
  onShow() {
    // 页面显示
  },
  onHide() {
    // 页面隐藏
  },
  onUnload() {
    // 页面被关闭
  },
  onTitleClick() {
    // 标题被点击
  },
  onPullDownRefresh() {
    // 页面被下拉
  },
  onReachBottom() {
    // 页面被拉到底部
  },
  async verifyAction() {
    const { status } = this.data;
    if (status === 0) {
      const { res } = await startVerify();
      const data = res.data;
      if (data && data.success && data.code === '10000') {
        this.setData({ status: 1 });
      } else {
        my.alert({content: '刷脸验证失败: ' + data.subMsg });
      }
    } else {
      my.alert({ content: '清除成功' });
      this.setData({ status: 0 });
    }
  }
});
