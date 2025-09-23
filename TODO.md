# TODO: Implement Order Submission to Database

## Current Status
- Cart functionality exists in frontend
- "Pesan Sekarang" button now calls submitOrder function
- Backend API endpoint /api/orders created and updated to match schema
- Order and OrderItem models updated
- Database migrations run

## Tasks
- [x] Add order submission function in App.tsx to send cart data to backend API
- [x] Pass order function as prop to Navbar component
- [x] Update "Pesan Sekarang" button in Navbar.tsx to call order function
- [x] Handle success/error responses and clear cart on success
- [x] Update backend OrderController to match current schema
- [x] Update Order model fillable fields
- [x] Run migrations
- [x] Test order submission flow
