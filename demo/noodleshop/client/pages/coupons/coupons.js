import {
  getOrderList,
  getUserCard,
  getCardList,
} from '../../utils/api';

Page({
  data: {
    cardList: [],
  },
  async onLoad() {
    my.showLoading();

    const app = getApp();
    this.userId = await app.getUserId();
    const cardList = await getCardList(this.userId);
    this.setData({
      cardList,
    });

    // 存在一笔成功订单才具有领券资格，仅 Demo 示例
    const orderList = await getOrderList(this.userId);
    orderList.some((order) => {
      if (order.alipayTradeQueryResponse.tradeStatus === 'TRADE_SUCCESS') {
        this.successOrder = order;
        return true;
      }
      return false;
    });

    my.hideLoading();
  },
  async getCardHandler() {
    if (!this.successOrder) {
      my.showToast({
        content: '请先完成一笔支付后领取',
      });
      return;
    }

    my.showLoading();

    try {
      await getUserCard(this.userId, this.successOrder.alipayTradeQueryResponse.outTradeNo);
    } catch (error) {
      my.hideLoading();
      my.alert({
        title: '领取失败',
        content: error.subMsg
      });
    }

    try {
      const cardList = await getCardList(this.userId);
      this.setData({
        cardList,
      });
    } catch (error) {}

    my.hideLoading();
  },
  useHandler() {
    my.redirectTo({
      url: '/pages/shop/shop'
    });
  }
});
