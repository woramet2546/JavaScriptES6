let oldArray = [1, 2, 3, 4, 5];
let newArray = [];
let multiplyByTwo = [];
let AddString = [];
for (let i = 0; i < oldArray.length; i++) {
        newArray.push(oldArray[i]);
    }
// [1, 2, 3, 4, 5]
for (let i = 0; i < oldArray.length; i++) {
        multiplyByTwo.push(oldArray[i] *2);
    }
// [2, 4, 6, 8, 10]
for (let i = 0; i < oldArray.length; i++) {
        AddString.push("item " + oldArray[i]);
    }
// ["item 1", "item 2", "item 3", "item 4", "item 5"]