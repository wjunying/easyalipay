import {
  makeUserOrder,
  getGoodsList,
  getCardList,
  useCard,
} from '../../utils/api';

const setPrecision = v => +(v.toFixed(2));

Page({
  data: {
    menu: [], // 菜单列表
    selectedGoods: [], // 加购菜品列表
    totalPrice: 0, // 购物车总价
    activeTabIndex: 0, // 选中的菜单分类
    usedCard: null, // 用户可用代金券
  },
  async onLoad() {
    my.showLoading();
    const app = getApp();
    const menu = {};

    const goodsList = await getGoodsList();
    goodsList.forEach((goodsItem) => {
      const { goodsType } = goodsItem;
      if (menu[goodsType]) {
        menu[goodsType].goods.push(goodsItem);
      } else {
        menu[goodsType] = {
          title: goodsType,
          goods: [goodsItem],
        }
      }
    });
    this.setData({
      menu: Object.keys(menu).map(menuKey => menu[menuKey]),
    });
    my.hideLoading();

    const cardList = app.userId ? await getCardList(app.userId) : [];
    if (cardList.length) {
      this.setData({
        usedCard: cardList[0] // 本次下单使用的优惠券
      });
    }

    this.countTotalPrice();
  },
  onTabClick(index) {
    this.setData({
      activeTabIndex: index,
    });
  },
  /**
   * 加购食物动作，仅供示例
   */
  onFoodSelect(goods) {
    const { selectedGoods } = this.data;
    const goodsInCart = selectedGoods.filter(item => item.goods_id === goods.id)[0];
    if (goodsInCart && goodsInCart.quantity >= 10) {
      // 最多加购10份
      my.showToast({
        content: '单次购买数量已达上限',
        duration: 1000,
      });
      return;
    }

    if (goodsInCart) {
      goodsInCart.quantity += 1;
    } else {
      selectedGoods.push({
        goods_id: goods.id,
        goods_name: goods.goodsName,
        quantity: 1,
        price: +goods.goodsPrice,
      });
    }
    this.setData({
      selectedGoods,
    });
    this.countTotalPrice();
  },
  /**
   * 减少食物动作，仅供示例
   */
  onFoodReduce(goods) {
    const { selectedGoods } = this.data;
    const goodsInCart = selectedGoods.filter(item => item.goods_id === goods.id)[0];
    if (!goodsInCart) return;
    if (goodsInCart.quantity > 1) {
      goodsInCart.quantity -= 1;
    } else {
      const index = selectedGoods.indexOf(goodsInCart);
      selectedGoods.splice(index, 1);
    }
    this.setData({
      selectedGoods,
    });
    this.countTotalPrice();
  },
  /**
   * 计算购物车总价格
   */
  countTotalPrice() {
    const { selectedGoods, usedCard } = this.data;
    if (!selectedGoods.length) {
      this.setData({
        totalPrice: 0,
      });
      return;
    }

    const goodsTotal = selectedGoods.reduce((total, item) => total + (item.price * item.quantity), 0);
    this.setData({
      totalPrice: setPrecision(usedCard ? (goodsTotal <= 0.01 ? 0.01 : goodsTotal - 0.01) : goodsTotal),
    });
  },
  /**
   * 提交订单
   */
  async makeOrder() {
    const { selectedGoods, usedCard, totalPrice } = this.data;

    if (!selectedGoods.length) {
      my.showToast({
        content: '购物车为空',
      });
      return;
    }

    const app = getApp();
    const userId = await app.getUserId();

    let orderResult = null;
    my.showLoading();
    //  交易系统创建订单
    try {
      orderResult = await makeUserOrder(userId, selectedGoods, totalPrice, usedCard ? usedCard.cardId : '');
      my.hideLoading();
    } catch (error) {
      my.hideLoading();
      my.showToast({
        content: '下单失败'
      });
      return;
    }

    // JSAPI 唤起客户端收银台
    try {
      await this.tradePay(orderResult.tradeNo);
    } catch (error) {
      my.showToast({
        content: '支付失败'
      });
      console.log(error);
      return;
    }

    my.showToast({
      content: '支付成功'
    });

    // 触发券核销，仅 Demo 示例
    if (usedCard) {
      await useCard(userId, usedCard.serialNumber, usedCard.cardId);
    }
  },
  tradePay(tradeNO) {
    return new Promise((resolve, reject) => {
      my.tradePay({
        tradeNO,
        success: (res) => {
          if (res.resultCode === '9000') { // 支付成功
            resolve(res);
          } else {
            reject(res);
          }
        },
        fail: (error) => {
          reject(error);
        }
      });
    });
  }
});
