interface productType {
    img: string;
    name: string;
    type: string;
    price: string;
    unit: string;
    new: boolean;
    onSell: number;
}

const product: Array<productType> = [
    {
        img: "/ProductAsset/test-product-asset.svg",
        name: "草莓奶酪",
        type: "甜點",
        price: "60",
        unit: "個",
        new: false,
        onSell: 0,
    },
    {
        img: "/ProductAsset/test-product-asset.svg",
        name: "草莓奶酪",
        type: "甜點",
        price: "60",
        unit: "個",
        new: true,
        onSell: 0,
    },
    {
        img: "/ProductAsset/test-product-asset.svg",
        name: "草莓奶酪",
        type: "甜點",
        price: "60",
        unit: "個",
        new: false,
        onSell: 20,
    },
];

function getRandomInt(max: number) {
    return Math.floor(Math.random() * max);
}

export let getTestProduct = (index: number): Array<productType> => {
    let productArray: Array<productType> = [];
    for (let i = 0; i < index; i++) {
        productArray.push(product[getRandomInt(3)]);
    }
    return productArray;
};
