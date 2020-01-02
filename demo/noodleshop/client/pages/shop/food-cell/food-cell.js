Component({
  data: {
    quantity: 0,
  },
  props: {
    goodsInfo: {},
    selectedGoods: [],
    onSelect: () => {},
  },
  didMount() {},
  didUpdate() {},
  deriveDataFromProps(nextProps) {
    const { goodsInfo, selectedGoods } = nextProps;
    const isInCart = selectedGoods.some((item) => {
      if (item.goods_id === goodsInfo.id) {
        this.setData({
          quantity: item.quantity,
        });
        return true;
      }
      return false;
    });
    if (!isInCart && this.data.quantity) {
      this.setData({
        quantity: 0,
      });
    }
  },
  didUnmount() {},
  methods: {
    selectHandler() {
      this.props.onSelect(this.props.goodsInfo);
    },
    reduceHandler() {
      this.props.onReduce(this.props.goodsInfo);
    },
  },
});
