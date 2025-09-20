# Use the official Nginx base image
FROM nginx:alpine

# Set working directory
WORKDIR /usr/share/nginx/html

# Remove default Nginx static files
RUN rm -rf ./*

# Copy your portfolio build files (static HTML, CSS, JS, images, etc.)
COPY . .

# Expose port 80
EXPOSE 80

# Nginx automatically starts when container runs
