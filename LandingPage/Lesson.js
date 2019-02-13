//ОБЬЕКТЫ С НУЛЯ ДЛЯ ИМБИЦИЛОВ ЕЩЁ РАЗОК

// var obj = {
    //hey: 'hi', 
    //name: 'mike'
//} // Создаём обьект obj с свойствами hey , name
// console.log (obj['hey']);
// console.log (obj.hey);
// console.log (Object.keys(obj));



// var object = {}; // Создаём пустой обьект object
// object.property1 = 'FUCK BULLSHIT'; // Добавляем свойство property1
// object.property2 = 'SHIT FUCK SHIT';
// object['property3'] = 'FUCK CRAP'; // Те же яйца только в профиль

// console.log (Object.keys(object));
// console.log (object.property1, object.property2, object.property3); // Обращаемся к свойству property1 обьекта object


// var dinoObject = [
//     {type: 'TREX', age: '300'},
//     {type: "FUCKKILLER", age: '200'}
// ];
// console.log(dinoObject[0]);
// console.log (dinoObject[1]['type']);
// console.log (dinoObject[1].age);

// var anna = { name: "Анна", age: 11, luckyNumbers: [2, 4, 8, 16] };
// var dave = { name: "Дэйв", age: 5, luckyNumbers: [3, 9, 40] };
// var kate = { name: "Кейт", age: 9, luckyNumbers: [1, 2, 3] };
// var friends = [anna, dave, kate];
// console.log (friends[0].luckyNumbers[1]); // 4 

// var myCrazyObject = {
//     "name": "Нелепый объект",
//     "some array": [7, 9, { purpose: "путаница", number: 123 }, 3.3],
//     "random animal": "Банановая акула"
//     };
// console.log (myCrazyObject["some array"][2].number);

// var animals = ["Кот", "Рыба", "Лемур", "Комодский варан"];
// //console.log(animals.length);
// for (var i = 0; i <= animals.length; i++){
//     animals[i] = animals[i] + '- прекрасное животное';
//     console.log(animals[i]);
// }
/////////////////////////////////////////////////////////////
//  function areArraysSame(one,two){
//     if (one.length === two.length){
//         console.log ('Длина массивов одинаковая, продолжаем');
//         for(let i = 0; i < one.length; i ++)
//         {
//             if (one[i]===two[i])
//             console.log(i, ' элемент совпадает, продолжаю');
//             else {
//                 console.log(i, 'элемент отличается, заканчиваем');
//                 return;
//             }
//         }
//         console.log("Массивы совпали");
//         return true;
//     }
//     else {
//         console.log('Длина массивов разная, заканчиваем');
//         return false;
//     } 
//  }
//  areArraysSame ([1,2,3,4], [1,2,3,5]);
 