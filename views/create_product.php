<div class="app-content-header">

    <h1 class="app-content-headerText">إضافة منتج جديد</h1>
    <button class="mode-switch" title="Switch Theme">
        <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <defs></defs>
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
        </svg>
    </button>
</div>
<br>
<br>
<div class="products-area-wrapper tableView">


    <div class="product-card">
        <form action="process_create_product.php" method="POST">
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" required >

            <label for="description">الوصف</label>
            <textarea id="description" name="description" rows="4" required ></textarea>

            <label for="price">السعر ( بالدينار الليبي )</label>
            <input type="number" id="price" name="price" step="0.001" required >

            <label for="qty">الكمية الحالية</label>
            <input type="number" id="qty" name="qty" required>


            <button type="submit">حفظ</button>
        </form>
    </div>
</div>