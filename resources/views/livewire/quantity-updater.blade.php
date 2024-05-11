<div class="quantity-input d-flex justify-content-between">
    <button style="
         align-self: center;
    background-color: #fff;
    background-image: none;
    background-position: 0 90%;
    background-repeat: repeat no-repeat;
    background-size: 4px 3px;
    border-radius: 15px 225px 255px 15px 15px 255px 225px 15px;
    border-style: solid;
    border-width: 2px;
    box-shadow: rgba(0, 0, 0, .2) 15px 28px 25px -18px;
    box-sizing: border-box;
    color: #41403e;
    cursor: pointer;
    display: inline-block;
    font-family: Neucha, sans-serif;
    font-size: 1rem;
    line-height: 23px;
    outline: none;
    padding: .75rem;
    text-decoration: none;
    transition: all 235ms ease-in-out;
    border-bottom-left-radius: 15px 255px;
    border-bottom-right-radius: 225px 15px;
    border-top-left-radius: 255px 15px;
    border-top-right-radius: 15px 225px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    "
    onmouseover="this.style.boxShadow='rgba(0, 0, 0, .3) 2px 8px 8px -5px'; this.style.transform='translate3d(0, 2px, 0)';"
    onmouseout="this.style.boxShadow='rgba(0, 0, 0, .2) 15px 28px 25px -18px'; this.style.transform='none';" class="btn-55" wire:click="decrement({{$product->id}})" onclick="refreshPage()">-</button>
   
   
    <input class="col-4 text-center" name="quantity" type="number" wire:model="quantity">
   
    <button  style="
    align-items: center;
    appearance: none;
    background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
    border: 0;
    border-radius: 6px;
    box-shadow: rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-flex;
    font-family: 'JetBrains Mono', monospace;
    height: 48px;
    justify-content: center;
    line-height: 1;
    list-style: none;
    overflow: hidden;
    padding-left: 16px;
    padding-right: 16px;
    position: relative;
    text-align: left;
    text-decoration: none;
    transition: box-shadow .15s, transform .15s;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    white-space: nowrap;
    will-change: box-shadow, transform;
    font-size: 18px;
"
onfocus="
    this.style.boxShadow = '#3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset';
"
onmouseover="
    this.style.boxShadow = 'rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset';
    this.style.transform = 'translateY(-2px)';
"
onmouseout="
    this.style.boxShadow = 'rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, rgba(58, 65, 111, .5) 0 -3px 0 inset';
    this.style.transform = 'none';
"
onmousedown="
    this.style.boxShadow = '#3c4fe0 0 3px 7px inset';
    this.style.transform = 'translateY(2px)';
"
onmouseup="
    this.style.boxShadow = 'rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset';
    this.style.transform = 'none';
"
    
    class="btn-29" wire:click="increment({{$product->id}})" onclick="refreshPage()">+</button>
</div>

